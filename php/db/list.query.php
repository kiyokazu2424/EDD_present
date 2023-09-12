<?php
namespace db;
use model\ListModel;
use model\UserModel;

class ListQuery {
    public static function fetchByUserId($user_id) {
        $db = new DataSource();
        $result = $db->select("
            select * from lists 
            where user_id = :user_id
        ",[
            ':user_id' => $user_id

        ],DataSource::$CLASS, ListModel::class);
        return $result;
    }

    public static function fetchByGenderAndAge($gender, $age) {
        $db = new DataSource();
        $result = $db->select("
            select l.*, u.age, u.gender from lists l 
            inner join users u 
                on u.id = l.user_id 
            where u.gender = :gender and u.age = :age
        ",[
            ':gender' => $gender,
            ':age' => $age
        ],DataSource::$CLASS, ListModel::class);
        return $result;
    }

    public static function insert($list) {
        $db = new DataSource();
        $session_user = UserModel::getSession();
        return $db->execute("
            insert into lists (name, published, user_id, updated_by)
            values (
                :name,
                :published,
                :user_id,
                :updated_by
            )
        ", [
            ":name" => $list->name,
            ":published" => $list->published,
            ":user_id" => $session_user->id,
            ":updated_by" => $session_user->nickname,
        ]);

    }

    public static function fetchListIDByUserID($user_id) {
        $db = new DataSource();
        $result = $db->selectOne("
            select id from lists  
            where user_id = :user_id
        ",[
            ":user_id" => $user_id
        ], DataSource::$CLASS, ListModel::class);

        return $result->id;
    }

    public static function fetchListByListname($user_id, $list_name) {
        $db = new DataSource();
        $result = $db -> selectOne("
            select id from lists 
            where name = :list_name and user_id = :user_id
        ",[
            ":list_name" => $list_name,
            ":user_id" => $user_id
        ],DataSource::$CLASS, ListModel::class);

        return $result;

    }

    public static function fetchListNameByUserID($user_id) {
        $db = new DataSource();
        $result = $db->select("
            select name from lists
            where user_id = :user_id
        ",[
            ":user_id" => $user_id
        ]);

        return $result;

    }
} 
?>