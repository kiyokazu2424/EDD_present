<?php
    namespace view\lists\search;

    function index() {
        ?>
        <h1>検索画面</h1>
        <form action="<?php the_url('lists/result'); ?>" method="POST">
            <div>
                年齢:<select name="age">
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                    </select>
            </div>   
            <div>
                性別:<select name="gender">
                        <option value="0">男性</option>
                        <option value="1">女性</option>
                        <option value="2">その他</option>
                    </select>
            </div> 
            <div>
                <input type="submit" value="検索">
            </div>
        </form>
        <?php
    }
?>