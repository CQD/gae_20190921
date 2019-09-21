<?php
use Google\Cloud\Datastore\DatastoreClient;

require __DIR__ . '/../vendor/autoload.php';

// datastore 的資料分組單位為 kind（對應關連式資料庫的 table）
// 儲存單位是 entity（對應關連式資料庫的 table 中的一個 row）
// 每個 entity 會有個專門用來辨別這個實體的 key（類似關連式資料庫的 Primary key）

// 另，實務上 google app engine 會把 access log 寫入 stackdriver，不需要自行維護

///////////////////////////////////////////////////////////////////////////////

// 這是 Google Datastore SDK
$datastore = new DatastoreClient([
    'projectId' => getenv('GCLOUD_PROJECT'),
]);

// 產生新實體要用的 key
// key 會包含 kind、entity 本身的辨識代號（字串或整數）、祖系路徑（這裡不討論），及命名空間（這裡不討論）
// 產生 key 時如必須要指定 kind，果不提供辨識代號，datastore 會自動產生辨識代號
$key = $datastore->key('visit');

// 建立一個新的 instance
// 若是不指定 key（設定為 null）則交由系統自動產生
// excludeFromIndexes 是用來設定不要為這些欄位建立 index，節省使用的空間
$entity = $datastore->entity($key, [
    'user_ip' => $_SERVER['REMOTE_ADDR'] ?? null,
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
    'timestamp' => new DateTime(),
], [
    'excludeFromIndexes' => ['user_agent'],
]);

// 實際把實體寫入 datastore
$datastore->insert($entity);

// 依照時間順序拉出最新十筆資料
// datastore 的收費標準是讀取/寫入/刪除的 entity 數量
// 有每日免費配額
//
// 注意 query 不會馬上被執行，要 runQuery 之後才會拿到結果
$query = $datastore->query()
    ->kind('visit')
    ->order('timestamp', 'DESCENDING')
    ->limit(10);

$results = $datastore->runQuery($query);


echo "存取紀錄：<br>\n";

foreach ($results as $entity) {
    printf(
        "TIMESTAMP: %s,IP: %s, UA: %s<br>\n",
        $entity['timestamp']->format('Y-m-d H:i:s'),
        $entity['user_ip'],
        $entity['user_agent']
    );
}
