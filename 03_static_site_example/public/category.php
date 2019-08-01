<?php

use MySite\Model\Category;
use MySite\Model\Article;

$id = (int) $_GET['id'] ?? 1;
$category = Category::find($id);

return [
    'template' => 'list.twig',
    'data' => [
        'title' => $category['title'],
        'articles' => Article::listByCategory($id),
    ],
];
