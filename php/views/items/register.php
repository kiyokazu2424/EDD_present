<?php
namespace view\items\register;

function index($lists_name) {
    ?>
    <h1>ほしい物リスト登録画面</h1>
    <form method="POST">
        <?php for($i = 0; $i < 3; $i++):?>
            <?php $ii = $i + 1; ?>
            <h2>ほしい物<?php echo($ii); ?></h2>
            <div>
                product_name:<input type="text" name="name<?php echo($ii); ?>">
            </div>
            <div>
                url:<input type="text" name="url<?php echo($ii); ?>">
            </div>
            <div>
                <select name="list_name<?php echo($ii); ?>" id="">
                    <?php foreach($lists_name as $list_name) :?>
                    <option value="<?php echo($list_name['name']);?>"><?php echo($list_name['name']);?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endfor; ?>
    

        <div>
            <input type="submit" value="登録">
        </div>
    </form>
    <?php
}

?>