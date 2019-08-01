## 03 - Static Site

這是個簡單但完整的靜態（無資料庫）網頁範例。同時也用來示範以下兩件事：

- 可以用 header 來控制 Google Frontend Server 的快取機制。
  - 快取機制很有用，但 Google 的官方文件並未提到相關功能，使用上要注意。
- 對於 GAE 二代 runtime，[composer](https://getcomposer.org/) 安裝套件的 `vendor/` 資料夾不用上傳到 GAE，runtime 會自動依照 `composer.lock` 在部署程式時安裝相依套件。
  - 但對 GAE 一代 runtime 來說，部署程式時還是還是需要把 `vendor/` 資料夾上傳到 GAE 內。


## 操作步驟

在 Cloud Shell 中執行：

```#!shell
make deploy
```

程式就會自動 deploy 到對應的專案上。
