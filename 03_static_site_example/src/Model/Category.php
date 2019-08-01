<?php

namespace MySite\Model;

class Category
{
    private static $list = [
        1 => 'GCP',
        2 => 'PHP',
        3 => 'DevOps',
        4 => '演算法',
        5 => '非技術觀點',
    ];

    public static function find(int $id)
    {
        return [
            'id' => $id,
            'title' => static::$list[$id] ?? '不明',
        ];
    }

    public static function listAll() {
        $list = [];
        foreach (static::$list as $id => $value) {
            $list [$id] = static::find($id);
        }
        return $list;
    }
}
