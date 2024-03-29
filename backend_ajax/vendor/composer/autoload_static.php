<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae0fbd1dca76b10654803163f023c61f
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae0fbd1dca76b10654803163f023c61f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae0fbd1dca76b10654803163f023c61f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
