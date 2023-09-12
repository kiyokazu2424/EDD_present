<?php 
require_once 'config.php';

require_once BASE_PHP_PATH . 'partials/header.php';
require_once BASE_PHP_PATH . 'partials/footer.php';

require_once BASE_PHP_PATH . 'models/abstract.model.php';
require_once BASE_PHP_PATH . 'models/user.model.php';
require_once BASE_PHP_PATH . 'models/item.model.php';
require_once BASE_PHP_PATH . 'models/list.model.php';

require_once BASE_PHP_PATH . 'db/datasource.php';
require_once BASE_PHP_PATH . 'db/user.query.php';
require_once BASE_PHP_PATH . 'db/item.query.php';
require_once BASE_PHP_PATH . 'db/list.query.php';

require_once BASE_PHP_PATH . 'libs/route.php';
require_once BASE_PHP_PATH . 'libs/auth.php';
require_once BASE_PHP_PATH . 'libs/helper.php';
require_once BASE_PHP_PATH . 'libs/message.php';
require_once BASE_PHP_PATH . 'libs/operate.php';

require_once BASE_PHP_PATH . 'views/home.php';
require_once BASE_PHP_PATH . 'views/login.php';
require_once BASE_PHP_PATH . 'views/register.php';
require_once BASE_PHP_PATH . 'views/items/register.php';
// require_once BASE_PHP_PATH . 'views/items/search.php';
// require_once BASE_PHP_PATH . 'views/items/result.php';
require_once BASE_PHP_PATH . 'views/items/edit.php';
require_once BASE_PHP_PATH . 'views/setting.php';
require_once BASE_PHP_PATH . 'views/lists/add.php';
require_once BASE_PHP_PATH . 'views/lists/search.php';
require_once BASE_PHP_PATH . 'views/lists/result.php';
require_once BASE_PHP_PATH . 'views/lists/detail.php';


session_start();

\partials\header();

// リクエストされたリンクに応じて、ファイルを呼び出す。
$path = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$url = parse_url($path);
$path = $url['path'];
libs\router($path, $method);

\partials\footer();




