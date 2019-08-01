<?php

use MySite\Model\Category;
use Twig\Loader\FilesystemLoader as FileLoader;
use Twig\Environment as Twig;

require __DIR__ . '/../vendor/autoload.php';

// 依照網址決定要執行哪隻 PHP 程式
// 程式會回傳要顯示在畫面上的資料（但不是網頁本體）
// 如果碰到不認識的網址就進入 404 頁面
$urlMap = [
    '/'         => __DIR__ . '/home.php',
    '/category' => __DIR__ . '/category.php',
    '/article'  => __DIR__ . '/article.php',
    '/404'      => __DIR__ . '/404.php',
];

$path = @parse_url($_SERVER['REQUEST_URI'])['path'];

$controller = $urlMap[$path] ?? $urlMap['/404'];

$page = require $controller;

// 設定快取控制 header
// Google Frontend Server 會依照這些 header 來做快取
// 要注意 App Engine 透過 GFS 的行為似乎沒有在文件上提到過
// 所以也不會有功能保障
header('cache-control: public, max-age=3600');

// 用 twig 這套樣版引擎來輸出 HTML
$page['data']['categories'] = Category::listAll();
$twig = new Twig(new FileLoader(__DIR__ . '/../twig/'));
echo $twig->render($page['template'], $page['data']);
