<?php
namespace view\items\result;

function index($items) {
    if(count($items) == 0) {
        echo("<h2>検索結果が見つかりません。</h2>");
    } else {
        echo("<pre>");
        print_r($items);
        echo("</pre>");
    }
}

?>