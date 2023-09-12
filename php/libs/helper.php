<?php
function redirect($path) {
    if($path === GO_HOME) {
        $path = get_url('');
    } else if($path == GO_REFERER) {
        $path = $_SERVER['HTTP_REFERER'];
    } else {
        $path = get_url($path);
    }

    header("Location: {$path}");
    die();
}

function get_url($path) {
    return BASE_CONTEXT_PATH . trim($path, '/');
}

function get_param_from_rq($key, $default_val, $is_post = true) {
    $array = $is_post ? $_POST : $_GET;
    return $array[$key] ?? $default_val;
}

function the_url($path) {
    echo BASE_CONTEXT_PATH . $path;
}

// デバッグ用の関数
function confirmData($val) {
    echo('<pre>');
    print_r($val);
    echo('</pre>');
}

?>