<?php
require __DIR__ . '/navbar.php';

printf('[%s] 我是個很陽春的「關於我」頁面', date('Y-m-d H:i:s'));

echo "<pre>網址參數：\n", json_encode($_GET, JSON_PRETTY_PRINT);
