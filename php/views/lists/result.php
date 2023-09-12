<?php
    namespace view\lists\result;

    function index($lists) {
        ?>
        <h1>検索結果</h1>
        <?php
        foreach($lists as $list) :
        ?>
            <a href="<?php the_url("lists/detail/?list_id={$list->id}&user_id={$list->user_id}"); ?>"><?php echo $list->name;?>の詳細を見る</a>
        <?php
        confirmData($list);
        endforeach ;
    }
?>