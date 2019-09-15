## 01 - Hello World
這是最基本的 Google App Engine 程式。只有兩個檔案：

- `app.yaml`
- `public/index.php`

這裡的 `app.yaml` 定義了基礎 app engine 環境設定。並且設定所有的 request 要經過預設的 request handler 處理，對 PHP runtime 來說會是 `/public/index.php` 或是 `/index.php`。


## 操作步驟

在 Cloud Shell 中執行：

```#!shell
make deploy
```

程式就會自動 deploy 到對應的專案上。
