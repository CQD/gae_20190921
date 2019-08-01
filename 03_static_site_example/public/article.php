<?php

use MySite\Model\Article;

$id = (int) $_GET['id'] ?? 1;
$article = Article::find($id);

return [
    'template' => 'article.twig',
    'data' => [
        'title' => $article['title'],
        'article' => $article,
    ],
];
