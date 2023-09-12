<?php
namespace controllers\items\register;

use db\ListQuery;
use lib\Auth;
use model\ItemModel;
use lib\Message;
use lib\Operate;
use model\UserModel;

function get() {
    Auth::requireLogin();
    $list_name = ListQuery::fetchListNameByUserID(UserModel::getSession()->id);
    \view\items\register\index($list_name);
}

function post() {
    Auth::requireLogin();
    $session_user_id = UserModel::getSession()->id;

    $items = [
        'item1' => new ItemModel(),
        'item2' => new ItemModel(),
        'item3' => new ItemModel(),
    ];



    $items["item1"]->name = get_param_from_rq('name1', "");
    $items["item1"]->url = get_param_from_rq('url1', "");
    $items["item1"]->list_id = ListQuery::fetchListByListname($session_user_id, get_param_from_rq("list_name1", ""))->id;
    $items["item2"]->name = get_param_from_rq('name2', "");
    $items["item2"]->url = get_param_from_rq('url2', "");
    $items["item2"]->list_id = ListQuery::fetchListByListname($session_user_id, get_param_from_rq("list_name2", ""))->id;
    $items["item3"]->name = get_param_from_rq('name3', "");
    $items["item3"]->url = get_param_from_rq('url3', "");
    $items["item3"]->list_id = ListQuery::fetchListByListname($session_user_id, get_param_from_rq("list_name3", ""))->id;

    // 入力されていない値を配列から削除する操作。
    foreach($items as $key => $item) {
        if($item->name == "" || $item->url == "") {
            // $items[$key] = null;
            unset($items[$key]);
        }
    }


    if(empty($items)) {
        Message::push(Message::ERROR, "欲しいものを入力してください。");
        redirect(GO_REFERER);
    }


    foreach($items as $item) {
        if(!Operate::insertItem($item)) {
            redirect(GO_REFERER);
        }
    }

    redirect(GO_HOME);

}

?>