<?php
namespace controllers\lists\detail;

use db\ItemQuery;
use lib\Auth;

function get() {
    Auth::requireLogin();
    
    $list_id = get_param_from_rq('list_id', '', false);
    $user_id = get_param_from_rq('user_id', '', false);
    $items = ItemQuery::fetchByUserIdAndListID($user_id, $list_id);

    \view\lists\detail\index($items);

}

?>