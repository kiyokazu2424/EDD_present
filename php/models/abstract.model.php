<?php
namespace model;

use Exception;

abstract class AbstractModel {
    public static $SessionName;
    public static function setSession($val) {
        $_SESSION[static::$SessionName] = $val;
    }

    public static function getSession() {
        return $_SESSION[static::$SessionName] ?? null;
    }

    public static function clearSession() {
        try {
            $_SESSION[static::$SessionName] = null;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function getSessionAndFlush() {
        try {
            return static::getSession();
        } finally {
            static::clearSession();
        }
    }
}
?>