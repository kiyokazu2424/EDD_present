<?php
namespace controllers\login;
use model\UserModel;
use lib\Auth;

function get() {
    \view\login\index();
}

function post() {
    $user = new UserModel();
    $user->nickname = $_POST['nickname'];
    $user->pwd = $_POST['pwd'];

    if(Auth::login($user)) {
        redirect(GO_HOME);
    } else {
        redirect(GO_REFERER);
    }


}