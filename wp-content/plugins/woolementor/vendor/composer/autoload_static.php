<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc988d082f3f6f84b88078c4b2c5cfbf1
{
    public static $files = array (
        '41142db130fe6a191ea599935f4561bd' => __DIR__ . '/../..' . '/functions/helpers.php',
        '744ee957542bc43104931f7ed41905d4' => __DIR__ . '/../..' . '/functions/options.php',
    );

    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'codexpert\\Woolementor\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'codexpert\\Woolementor\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'codexpert\\product\\Base' => __DIR__ . '/..' . '/codexpert/product/src/Base.php',
        'codexpert\\product\\Deactivator' => __DIR__ . '/..' . '/codexpert/product/src/Deactivator.php',
        'codexpert\\product\\Fields' => __DIR__ . '/..' . '/codexpert/product/src/Fields.php',
        'codexpert\\product\\License' => __DIR__ . '/..' . '/codexpert/product/src/License.php',
        'codexpert\\product\\Metabox' => __DIR__ . '/..' . '/codexpert/product/src/Metabox.php',
        'codexpert\\product\\Notice' => __DIR__ . '/..' . '/codexpert/product/src/Notice.php',
        'codexpert\\product\\Settings' => __DIR__ . '/..' . '/codexpert/product/src/Settings.php',
        'codexpert\\product\\Setup' => __DIR__ . '/..' . '/codexpert/product/src/Setup.php',
        'codexpert\\product\\Survey' => __DIR__ . '/..' . '/codexpert/product/src/Survey.php',
        'codexpert\\product\\Table' => __DIR__ . '/..' . '/codexpert/product/src/Table.php',
        'codexpert\\product\\Update' => __DIR__ . '/..' . '/codexpert/product/src/Update.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc988d082f3f6f84b88078c4b2c5cfbf1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc988d082f3f6f84b88078c4b2c5cfbf1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc988d082f3f6f84b88078c4b2c5cfbf1::$classMap;

        }, null, ClassLoader::class);
    }
}
