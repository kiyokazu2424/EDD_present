<?php
namespace model;

class UserModel extends AbstractModel {
    public int $id;
    public string $nickname;
    public string $pwd;
    public int $gender;
    public int $age;
    public int $del_flg;
    public string $updated_by;

    public $updated_at;
    public static $SessionName = '_user';

}

?>