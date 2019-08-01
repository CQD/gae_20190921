<?php

namespace MySite\Model;

use MySite\Helper\Textgen;

class Article
{
    public static function find(int $id)
    {
        srand($id);
        $categoryId = ( (int) ($id / 10000) ) ?: 1;
        return [
            'id' => $id,
            'title' => Textgen::gen($id, rand(15, 25)),
            'content' => Textgen::gen($id, rand(500, 2000), true),
            'category' => Category::find($categoryId),
        ];
    }

    public static function listByCategory(int $cateId, $limit = 15) {
        $list = [];
        for ($i = 0; $i < $limit; $i++) {
            $id = $cateId * 10000 + $i;
            $list [$id] = static::find($id);
        }
        return $list;
    }
}
