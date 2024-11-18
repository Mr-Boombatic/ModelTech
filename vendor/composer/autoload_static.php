<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4690ee9bbb0caa6a58ee2e3a397997ee
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4690ee9bbb0caa6a58ee2e3a397997ee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4690ee9bbb0caa6a58ee2e3a397997ee::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4690ee9bbb0caa6a58ee2e3a397997ee::$classMap;

        }, null, ClassLoader::class);
    }
}
