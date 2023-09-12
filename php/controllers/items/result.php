<?php
namespace controllers\items\result;

use lib\Message;
use lib\Auth;
use db\ItemQuery;

function get() {
    Auth::requireLogin();

    Message::push(Message::ERROR, "検索してください。");
    redirect('items/search');
}

function post() {
    Auth::requireLogin();

    $age = get_param_from_rq('age', "");
    $gender = get_param_from_rq('gender', "");

    $items = ItemQuery::fetchByGenderAndAge($gender, $age);
    \view\items\result\index($items);
}

?>