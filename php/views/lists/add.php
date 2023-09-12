<?php
namespace view\lists\add;

function index() {
    ?>
    <h1>リスト登録ページ</h1>
    <form method="POST">
        <div>
            listname:<input type="text" name="list_name">
            published:<select name="published" id="">
                <option value="1" selected>公開</option>
                <option value="0">非公開</option>
            </select>
        </div>
        <div>
            商品名:<input type="text" name="product_name1">
            商品リンク:<input type="text" name="url1">
        </div>
        <div>
            商品名:<input type="text" name="product_name2">
            商品リンク:<input type="text" name="url2">
        </div>
        <div>
            商品名:<input type="text" name="product_name3">
            商品リンク:<input type="text" name="url3">
        </div>
        <input type="submit" value="登録">
    </form>
    <?php

}
?>