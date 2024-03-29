<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba62f761ec1c18d12e135d935a83a2ba
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'model\\' => 6,
        ),
        'd' => 
        array (
            'db\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'db\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba62f761ec1c18d12e135d935a83a2ba::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba62f761ec1c18d12e135d935a83a2ba::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
