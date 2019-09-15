## 02 - Hello Index

這幾乎還是最基本的 Google App Engine 程式，但示範了如何用
`public/index.php` 作為 front controller 來選擇要執行的程式。

這裡的用法只是作為範例，對於小型應用來說也足夠使用。
但對於大規模網站來說，建議還是引入專門的 request router（例如 [nikic/fast-route](https://github.com/nikic/FastRoute)）來依照網址決定要執行的程式；
或引入功能完整的框架（例如 [Laravel](https://laravel.tw/) 或 [Symfony](https://symfony.com/)），讓整個請求處理流程完全由由框架控制。

另外要注意，App Engine 不允許跳過 app.yaml 的設定直連 PHP 檔案。

## 操作步驟

在 Cloud Shell 中執行：

```#!shell
make deploy
```

程式就會自動 deploy 到對應的專案上。
