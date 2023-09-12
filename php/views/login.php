<?php
namespace view\login;

function index() {
    ?>
    <h1>ログインページです</h1>
    <form method="POST">
        <div>
            nickname: <input type="text" name="nickname"> 
        </div>
        <div>
            pwd: <input type="password" name="pwd">
        </div>
        <input type="submit" value="ログイン">
    </form>
    <?php
}