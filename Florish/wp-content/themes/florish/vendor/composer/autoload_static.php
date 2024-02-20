<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit11ba23e9e39f9294182c7242b015c0a3
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Florish\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Florish\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit11ba23e9e39f9294182c7242b015c0a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit11ba23e9e39f9294182c7242b015c0a3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit11ba23e9e39f9294182c7242b015c0a3::$classMap;

        }, null, ClassLoader::class);
    }
}
