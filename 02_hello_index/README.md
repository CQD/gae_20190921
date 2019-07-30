## 02 - Hello Index

這幾乎還是最基本的 Google App Engine 程式，但這裡示範了下列兩件事情：

- 以 `public/index.php` 作為 front controller 來選擇要執行的程式。
- [composer](https://getcomposer.org/) 用來安裝套件的 `vendor/` 資料夾不用上傳到 GAE，只要有 `composer.lock`，GAE 二代 runtime 會在部署程式識自動安裝相依套件。

## 操作步驟

在 Cloud Shell 中執行：

```#!shell
make deploy
```

程式就會自動 deploy 到對應的專案上。
