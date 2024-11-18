<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit4690ee9bbb0caa6a58ee2e3a397997ee
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit4690ee9bbb0caa6a58ee2e3a397997ee', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit4690ee9bbb0caa6a58ee2e3a397997ee', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit4690ee9bbb0caa6a58ee2e3a397997ee::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}