<?php
http_response_code(404);
printf('[%s] 這是個 404 頁面，你想看的網址我找不到', date('Y-m-d H:i:s'));

echo "<pre>網址參數：\n", json_encode($_GET, JSON_PRETTY_PRINT);
