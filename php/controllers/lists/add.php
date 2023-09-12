<?php
namespace controllers\lists\add;
use model\ItemModel;
use lib\Message;
use lib\Operate;
use lib\Auth;
use model\ListModel;

function get() {
    Auth::requireLogin();
    \view\lists\add\index();

}

function post() {
    Auth::requireLogin();
    
    $list = new ListModel();
    $list->name = get_param_from_rq('list_name', "");
    $list->published = get_param_from_rq('published', "");

    $items = [
        'item1' => new ItemModel(),
        'item2' => new ItemModel(),
        'item3' => new ItemModel(),
    ];

    $items["item1"]->name = get_param_from_rq('product_name1', "");
    $items["item1"]->url = get_param_from_rq('url1', "");
    $items["item2"]->name = get_param_from_rq('product_name2', "");
    $items["item2"]->url = get_param_from_rq('url2', "");
    $items["item3"]->name = get_param_from_rq('product_name3', "");
    $items["item3"]->url = get_param_from_rq('url3', "");

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

    Operate::registerListAndItems($list, $items);




}
?>