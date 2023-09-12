<?php
namespace controllers\setting;
use model\UserModel;
use lib\Auth;
use lib\Message;

function get() {
    Auth::requireLogin();

    $user = UserModel::getSession();
    \view\setting\index($user);
}

function post() {
    Auth::requireLogin();
    $user = new UserModel();
    $user->id = UserModel::getSession()->id;
    $user->nickname = get_param_from_rq('nickname', "");
    $user->pwd = get_param_from_rq('pwd', "");
    $user->gender = get_param_from_rq('gender', "");
    $user->age = get_param_from_rq('age', "");

    if(Auth::updateUser($user)) {
        Message::push(Message::INFO, "アカウント情報を更新しました。");
        redirect(GO_HOME);
    } else {
        Message::push(Message::ERROR, "アカウント情報を更新できませんでした。");
        redirect('setting');
    }
    

}
?>