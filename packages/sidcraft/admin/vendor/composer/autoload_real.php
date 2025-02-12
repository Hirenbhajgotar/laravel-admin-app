<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit666cfdcdd1ae7faa0b5ebc3a4b60cf67
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

        spl_autoload_register(array('ComposerAutoloaderInit666cfdcdd1ae7faa0b5ebc3a4b60cf67', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit666cfdcdd1ae7faa0b5ebc3a4b60cf67', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit666cfdcdd1ae7faa0b5ebc3a4b60cf67::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
