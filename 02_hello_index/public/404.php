<?php
require __DIR__ . '/navbar.php';

http_response_code(404);
printf('[%s] 這是個 404 頁面，你想看的網址「%s」我找不到',
    date('Y-m-d H:i:s'),
    $_SERVER['REQUEST_URI']
);
