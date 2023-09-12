<?php
namespace lib;
use db\ItemQuery;
use db\ListQuery;
use model\UserModel;

class Operate {

    public static function insertItem($item) {
        if(ItemQuery::insert($item)) {
            Message::push(Message::INFO, '欲しいものを登録しました( ^ω^ )');
            return true;
        } else {
            Message::push(Message::ERROR, '欲しいものを入力してください');
            return false;
        }

    }
    public static function getListAndTwoItemsBySessionId($id) {

    }

    public static function registerListAndItems($list, $items) {
        $session_user = UserModel::getSession();
        $exist_list = ListQuery::fetchListByListname($session_user->id, $list->name);
        if($exist_list) {
            Message::push(Message::ERROR, "このリスト名はすでに存在します。");
            redirect(GO_REFERER);
        }
        if(ListQuery::insert($list)) {
            $list_id = ListQuery::fetchListByListname($session_user->id, $list->name)->id;
            foreach($items as $item) {
                $item->list_id = $list_id;
                ItemQuery::insert($item);
            }
            Message::push(Message::INFO, "新しいリストを登録しました！！");
            redirect(GO_HOME);
            return true;
        } else {
            Message::push(Message::ERROR, "リストを作成できませんでした。");
            redirect('lists/add');
            return false;
        }
    }
}
?>