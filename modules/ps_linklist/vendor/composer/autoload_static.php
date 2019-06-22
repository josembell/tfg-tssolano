<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteb72c04d6db4c7dbb433d059b3e1195b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PrestaShop\\Module\\LinkList\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PrestaShop\\Module\\LinkList\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Ps_Linklist' => __DIR__ . '/../..' . '/ps_linklist.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteb72c04d6db4c7dbb433d059b3e1195b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteb72c04d6db4c7dbb433d059b3e1195b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteb72c04d6db4c7dbb433d059b3e1195b::$classMap;

        }, null, ClassLoader::class);
    }
}