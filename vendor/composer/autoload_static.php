<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd5f45ad043a37fa0563d3034edb84e1c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd5f45ad043a37fa0563d3034edb84e1c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd5f45ad043a37fa0563d3034edb84e1c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd5f45ad043a37fa0563d3034edb84e1c::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
