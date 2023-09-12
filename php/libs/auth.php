<?php
namespace lib;

use db\ItemQuery;
use db\UserQuery;
use model\UserModel;
use lib\Message;

class Auth{
    public static function login($user) {
        $is_success = false;
        // 入力値のチェック必須！！

        $exist_user = UserQuery::fetchByNickname($user->nickname);
        if($exist_user) {
            if(password_verify($user->pwd, $exist_user->pwd)) {
                $is_success = true;
                UserModel::setSession($exist_user);
                Message::push(Message::INFO, "{$user->nickname}さん、こんにちは");
                return $is_success;
            } else {
                Message::push(Message::ERROR, 'パスワードが一致しません。');
                return $is_success;
            }
        } else {
            Message::push(Message::ERROR, 'ユーザーが見つかりません。');
            return $is_success;
        }

    }

    public static function isLogin() {
        $session_user = UserModel::getSession() ?? false;
        return $session_user;
    }

    public static function regist($user) {
        // 入力値のチェック必須！！
        $exist_user = UserQuery::fetchByNickname($user->nickname) ?? null;
        if($exist_user) {
            Message::push(Message::ERROR, 'このニックネームはすでに存在しています。');
            return false;
        }

        $user->pwd = password_hash($user->pwd, PASSWORD_BCRYPT);

        if(UserQuery::insert($user)) {
            Message::push(Message::INFO, "{$user->nickname}さん、初めまして！！");
            return true;
        } else {
            return false;
        }
    }

    public static function logout() {
        if(UserModel::clearSession()) {
            Message::push(Message::INFO, 'ログアウトしました。');
            return true;
        } else {
            Message::push(Message::ERROR, "ログアウトできませんでした。");
            return false;
        };
    }

    public static function requireLogin() {
        if(Auth::isLogin()) {
            return true;
        } else {
            Message::push(Message::ERROR, 'ログインしてください。');
            redirect('login');
            return false;
        }
    }

    public static function updateUser($user) {
        // 入力値のチェック！！！
        if(UserQuery::update($user)) {
            UserModel::setSession($user);
            return true;
        } else {
            return false;
        };
    }
}
?>