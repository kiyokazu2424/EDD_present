<?php
namespace db;
use model\UserModel;

class UserQuery
{
    public static function fetchByNickname($nickname) {
        $db = new DataSource();
        $result = $db->selectOne("
            select * from users where nickname = :nickname
        ",[
            ':nickname' => $nickname
        ],
        DataSource::$CLASS, UserModel::class) ?? [];

        return $result;

    }

    public static function fetchByID($id) {
        $db = new DataSource();
        $result = $db->selectOne("
            select * from users where id = :id
        ",[
            ':id' => $id
        ], DataSource::$CLASS, UserModel::class) ?? [];

        return $result;
    }

    public static function insert($user) {
        $db = new DataSource();
        return $db->execute("
            insert into users (nickname, pwd, gender, age, updated_by) values (
                :nickname, :pwd, :gender, :age, :updated_by)
        ",[
            ':nickname' => $user->nickname,
            ':pwd' => $user->pwd,
            ':gender' => $user->gender,
            ':age' => $user->age,
            ':updated_by' => $user->nickname
        ]);
    }

    public static function update($user) {
        $db = new DataSource();
        return $db->execute('
            update users 
            set 
                nickname = :nickname, 
                gender = :gender, 
                age = :age,
                updated_by = :nickname
            where id = :id
        ', [
            ':nickname' => $user->nickname,
            ':gender' => $user->gender,
            ':age' => $user->age,
            ':id' => $user->id
        ]);
    }
}
?>