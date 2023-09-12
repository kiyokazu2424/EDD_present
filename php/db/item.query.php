<?php
namespace db;

use model\ItemModel;
use model\UserModel;

class ItemQuery {
    public static function fetchBySessionUserID() {
        $user = UserModel::getSession();
        $db = new DataSource();

        $result = $db->select("
            select * from items where user_id = :user_id and del_flg != 1
        ",[
            ':user_id' => $user->id
        ],DataSource::$CLASS, ItemModel::class) ?? [];

        return $result;

    }

    public static function insert($item) {

        // 入力値のチェック必須！！！！
        $user = UserModel::getSession();

        $db = new DataSource();
        return $db->execute('
            insert into items (name, url, user_id, list_id, updated_by) values(
                :name,
                :url,
                :user_id,
                :list_id,
                :updated_by
            )
        ',[
            ':name' => $item->name,
            ':url' => $item->url,
            ':list_id' => $item->list_id,
            ':user_id' => $user->id,
            ':updated_by' => $user->nickname
        ]);

    }

    public static function fetchByGenderAndAge($gender, $age) {
        $db = new DataSource();
        $result = $db->select("
            select i.*, u.nickname from present.items i
            inner join present.users u 
                on u.id = i.user_id
            where u.gender = :gender and u.age = :age
        ",[
            ":gender" => $gender,
            ":age" => $age
        ],DataSource::$CLASS, ItemModel::class) ?? [];
        return $result;
    }

    public static function fetchByUserIdAndListID($user_id, $list_id) {
        $db = new DataSource();

        return $db->select("
            select * from items
            where user_id = :user_id and list_id = :list_id
        ",[
            ":user_id" => $user_id,
            ":list_id" => $list_id
        ],DataSource::$CLASS, ItemModel::class);
    }
}
