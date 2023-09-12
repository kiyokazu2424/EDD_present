<?php
namespace controllers\logout;
use lib\Auth;

function get() {
    if(Auth::logout()) {
        redirect(GO_HOME);
    } else {
        redirect(GO_REFERER);
    }
}