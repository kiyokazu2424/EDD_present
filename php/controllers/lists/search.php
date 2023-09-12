<?php
    namespace controllers\lists\search;
    use lib\Auth;

    function get() {
        Auth::requireLogin();
        
        \view\lists\search\index();
    }
?>