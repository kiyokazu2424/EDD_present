<?php 
namespace partials;
use lib\Auth;
use lib\Message;
use model\UserModel;

function header() {
    ?>
        <!DOCTYPE html>
        <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo BASE_CSS_PATH; ?>style.css">
            <title>Document</title>
        </head>
        <header>
            <h3>めにゅう</h3>
            <?php if(Auth::isLogin()) :?>
                <a href="<?php the_url(''); ?>">トップ</a>
                <a href="<?php the_url('lists/add'); ?>">リストを追加</a>
                <a href="<?php the_url('lists/search'); ?>">リストを検索</a>              
                <a href="<?php the_url('items/register'); ?>">アイテムを追加</a>              
                <a href="<?php the_url('logout'); ?>">ログアウト</a>              
                <a href="<?php the_url('setting'); ?>">設定</a>              
            <?php else: ?>
                <a href="<?php the_url('login'); ?>">ログイン</a>                      
            <?php endif; ?>
            <?php Message::flush(); ?>
        </header>
        <body>
    <?php
    }
?>
