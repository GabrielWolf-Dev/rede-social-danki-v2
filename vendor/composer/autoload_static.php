<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54173b47aa83c57c083609c8e11db4ed
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DankiCode\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DankiCode\\' => 
        array (
            0 => __DIR__ . '/../..' . '/DankiCode',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit54173b47aa83c57c083609c8e11db4ed::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54173b47aa83c57c083609c8e11db4ed::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit54173b47aa83c57c083609c8e11db4ed::$classMap;

        }, null, ClassLoader::class);
    }
}
