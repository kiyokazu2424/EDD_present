<?php
namespace controllers\items\edit;

use db\ItemQuery;
use model\UserModel;

function get() {
    $list_id = get_param_from_rq('list_id', "", false);
    $user_id = UserModel::getSession()->id;

    $items = ItemQuery::fetchByUserIdAndListID($user_id, $list_id);
    \view\items\edit\index($items);
}

function post() {

}
?>