<?php
namespace controllers\items\search;
use lib\Auth;

function get() {
    Auth::requireLogin();

    \view\items\search\index();
}

?>