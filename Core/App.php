<?php

namespace Core;
class App{

    protected static $container;
    public static function setContainer($container){
        static::$container = $container;
    }
    public static function container(){
        return static::$container;
    }

    public static function bind($key, $resolver){
        static::container()->bind($key, $resolver);
    }
    public static function resolve($key){
        return static::container()->resolve($key);
    }
}






// <?php

// namespace Core;

// // use Exception;

// class App
// {
//     protected static $container;

//     public static function setContainer($container)
//     {
//         static::$container = $container;
//     }

//     public static function container()
//     {
//         if (!static::$container) {
//             throw new Exception('Application container has not been set.');
//         }

//         return static::$container;
//     }

//     public static function bind($key, $resolver)
//     {
//         static::container()->bind($key, $resolver);
//     }

//     public static function resolve($key)
//     {
//         return static::container()->resolve($key);
//     }
// }
