<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5dc6400302734c12d8840d5ba3b3cb9
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Ivan\\Lan\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ivan\\Lan\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5dc6400302734c12d8840d5ba3b3cb9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5dc6400302734c12d8840d5ba3b3cb9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc5dc6400302734c12d8840d5ba3b3cb9::$classMap;

        }, null, ClassLoader::class);
    }
}
