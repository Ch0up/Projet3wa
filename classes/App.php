<?php

namespace JKosacki;

class App
{
    static $db = null;

    static function getDatabase()
    {
        if (!self::$db) {
            self::$db = new Database('root', 'troiswa', 'projet');
        }
        return self::$db;
    }

    static function getAuth()
    {
        return new Authentification(Session::getInstance());
    }

    static function redirect($page)
    {
        header("Location: $page");
        exit();
    }
}