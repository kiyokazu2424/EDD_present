<?php
namespace lib;
use model\AbstractModel;

class Message extends AbstractModel {
    public static $SessionName = '_msg';
    public const INFO = 'info';
    public const ERROR = 'error';
    public const DEBUG = 'debug';

    public static function push($type, $msg) {
        if(isset($_SESSION[static::$SessionName])) {
            $_SESSION[static::$SessionName] = [
                'info' => [],
                'error' => [],
                'debug' => []
            ];
        }

        $msgs = static::getSession();
        $msgs[$type] []= $msg;
        static::setSession($msgs);
    }

    public static function flush() {
        $msgs = static::getSessionAndFlush() ?? [];

        foreach($msgs as $key => $msg) {
            foreach($msg as $text) {
                if($key == 'debug') {
                    if(!DEBUG) {
                        continue;
                    }
                    confirmData($text);
                } else {
                    echo "<h2>{$key}:{$text}</h2>";
                }
            } 
        }
    }
}
?>