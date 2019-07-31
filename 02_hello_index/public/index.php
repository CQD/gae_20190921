<?php

date_default_timezone_set('Asia/Taipei');

// 依照網址決定要執行哪隻 PHP 程式
// 如果碰到不認識的網址就進入 404 頁面
//
// 這邊作為範例寫的比較簡單，無法處理大規模的應用
//
// 在現實生活的應用中通常會希望使用專門的 request router
// 來決定要怎樣的網址該呼叫執行甚麼程式
// （例如 nikic/fast-route https://github.com/nikic/FastRoute）
//
// 或是引入功能完整的框架（例如 Laravel 或 Symfony）
// 讓整個請求處理流程完全由由框架控制
//
$urlMap = [
    '/'      => __DIR__ . '/home.php',
    '/about' => __DIR__ . '/about.php',
    '/404'   => __DIR__ . '/404.php',
];

$path = @parse_url($_SERVER['REQUEST_URI'])['path'];

$controller = $urlMap[$path] ?? $urlMap['/404'];

require $controller;
