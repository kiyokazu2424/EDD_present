<?php
    namespace controllers\lists\result;

use db\ListQuery;
use lib\Auth;
    use lib\Message;

    function get() {
        Auth::requireLogin();

        Message::push(Message::ERROR, "検索してください。");
        redirect('lists/search');
    }

    function post() {
        Auth::requireLogin();
        $gender = get_param_from_rq('gender', "");
        $age = get_param_from_rq('age', "");

        $lists = ListQuery::fetchByGenderAndAge($gender, $age);

        \view\lists\result\index($lists);


    }
?>