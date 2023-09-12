<?php
namespace view\setting;

function index($user) {
    ?>
    <h1>アカウント編集画面</h1>
    <form method="POST">
        <div>
            nickname:<input type="text" name="nickname" value="<?php echo($user->nickname);?>">
        </div>
        <!-- <div>
            pwd:<input type="password" name="pwd" id="pwd" placeholder="新しいパスワードを入力してください。">
        </div> -->
        <div>
            gender:<select name="gender" id="gender">
                <option value="0" <?php echo ($user->gender == 0 ? "selected" : null);?>>男性</option>
                <option value="1" <?php echo ($user->gender == 1 ? "selected" : null);?>>女性</option>
                <option value="2" <?php echo ($user->gender == 2 ? "selected" : null);?>>その他</option>
            </select>
        </div>
        <div>
            age:<select name="age" id="age">
                    <option value="18" <?php echo ($user->age == 18 ? "selected" : null);?>>18</option>
                    <option value="19" <?php echo ($user->age == 19 ? "selected" : null);?>>19</option>
                    <option value="20" <?php echo ($user->age == 20 ? "selected" : null);?>>20</option>
                    <option value="21" <?php echo ($user->age == 21 ? "selected" : null);?>>21</option>
                    <option value="22" <?php echo ($user->age == 22 ? "selected" : null);?>>22</option>
                    <option value="23" <?php echo ($user->age == 23 ? "selected" : null);?>>23</option>
                    <option value="24" <?php echo ($user->age == 24 ? "selected" : null);?>>24</option>
                    <option value="25" <?php echo ($user->age == 25 ? "selected" : null);?>>25</option>
                    <option value="26" <?php echo ($user->age == 26 ? "selected" : null);?>>26</option>
                    <option value="27" <?php echo ($user->age == 27 ? "selected" : null);?>>27</option>
                    <option value="28" <?php echo ($user->age == 28 ? "selected" : null);?>>28</option>
                </select>
        </div>
        <div>
            <input type="submit" value="更新">
        </div>
    </form>
    <?php
}

?>