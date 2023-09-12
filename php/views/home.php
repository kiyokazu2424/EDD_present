<?php
namespace view\home;
use lib\Auth;
use lib\Message;

function index($lists, $items) {
    ?>
    <h1>トップページです</h1>
    <h2>ほしい物はあと<?php echo(100 - count($items)); ?>個登録できます。</h2>
    <?php if(Auth::isLogin()) :?>
        <?php foreach($lists as $list) :?>
            <div>
                <a href="<?php the_url("items/edit/?list_id={$list->id}") ?>"><?php echo $list->name; ?></a>
            </div>
        <?php endforeach ;?>
    <?php else :?>
        <h2>ログインして、欲しいものを登録しよう！！！</h2>
        <h2>
            <a href="<?php the_url('login'); ?>">ログイン</a>
        </h2>
    <?php endif ;
}
