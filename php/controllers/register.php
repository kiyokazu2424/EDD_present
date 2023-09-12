<?php
namespace controllers\register;
use lib\Auth;
use model\ListModel;
use model\UserModel;
use db\UserQuery;
use db\ListQuery;

function get() {
    \view\register\index();
}

function post() {
    $user = new UserModel();
    $user->nickname = $_POST['nickname'];
    $user->pwd = $_POST['pwd'];
    $user->gender = $_POST['gender'];
    $user->age = $_POST['age'];
    $user->updated_by = $_POST['nickname'];

    if(Auth::regist($user)) {
        $user = UserQuery::fetchByNickname($user->nickname);
        UserModel::setSession($user);
        $list = new ListModel();
        $list->name = "マイリスト1";
        $list->published = 1;
        ListQuery::insert($list);

        redirect('items/register');
    } else {
        redirect(GO_REFERER);
    }

    // if(Auth::regist())


}