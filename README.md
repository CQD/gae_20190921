## 2019-09-21 GDG Cloud 高雄 Google App Engine 教材

這個 repo 的內容是 GDG Cloud 高雄在 2019-09-21 的 Google App Engine
介紹中所用到的教材。

這份教學用的是 PHP，並使用 [composer](https://getcomposer.org/) 安裝相依的程式套件。

這份教材的內容是關於 Google App Engine 的[標準環境](https://cloud.google.com/appengine/docs/standard/)，並未涵蓋[彈性環境](https://cloud.google.com/appengine/docs/flexible/)。

## 使用說明

### 設定專案
首先在 Google Cloud Platform 的[管理後台](https://console.cloud.google.com)中，手動建立一個專案。專案建立的過程會需要幾分鐘的時間。

然後為這個專案[啟用 Google App Engine](https://console.cloud.google.com/appengine)。注意啟用時會需要選擇
GAE 要建立在哪個[地區](https://cloud.google.com/compute/docs/regions-zones)，請選擇離使用者地理位置最接近的區域
（對於台灣來說，最接近的可使用位置是香港 `asia-east2` 東京 `asia-northeast1` 或大阪 `asia-northeast2`）。

最後，由於 deploy 程式會需要用到 [Cloud Build](https://cloud.google.com/cloud-build/)，你需要為這個專案設定付費方式。
本次課程的內容不會超過免費配額上限。你也可以在操作完成之後取消付費方式與專案的綁定，以避免未來有額外支出。

### 取得範例程式

GAE 啟用之後，請開啟該專案的 [Cloud Shell](https://console.cloud.google.com/cloudshell/editor?shellonly=true)，然後用 git 把這個 repo 的內容拉下來：

```shell
git clone https://github.com/CQD/gae_20190921.git
```

然後在 Cloud Shell 中設定 gcloud 要使用的專案 ID

```
gcloud config set project {你的專案ID}
```

完成之後，請依照各個資料夾內的說明執行對應的工作。

## 注意事項

這份教材是設計成在 Google Cloud Shell 上使用。如果你希望在自己的機器上使用，那你需要額外做這些事情：

- [安裝](https://cloud.google.com/sdk/install)並[設定](https://cloud.google.com/sdk/docs/initializing)好 Google Cloud SDK，才能使用 gcloud 指令。
- 原本的 Makefile 需要 `GOOGLE_CLOUD_PROJECT` 環境變數，請把這個環境變數設定為你的專案 ID。
  - 或者，你可以手動執行 `gcloud app deploy --project=xxx` 指令，並把 xxx 改為你的專案 ID。
- 對於使用到 datastore 的範例，你需要設定 datastore emulator，請參照 [datastore emulator 說明文件](https://cloud.google.com/datastore/docs/tools/datastore-emulator)

