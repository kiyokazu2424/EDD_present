<?php
namespace controllers\home;

use db\ItemQuery;
use db\ListQuery;
use model\UserModel;
use lib\Auth;
use lib\Message;

function get() {
    
    $session_user = UserModel::getSession();
    if(is_null($session_user)) {
        $lists = null;
    } else {
        $lists = ListQuery::fetchByUserId($session_user->id);
        $items = ItemQuery::fetchBySessionUserID();
    }

    \view\home\index($lists, $items);
}