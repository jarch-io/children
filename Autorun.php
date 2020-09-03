<?php

namespace Jarch\Baby;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class Autorun
{
    public static function postUpdate(Event $event)
    {
        $composer = $event->getComposer();
        // do stuff
    }

    public static function postAutoloadDump(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        require $vendorDir . '/autoload.php';

        some_function_from_an_autoloaded_file();
    }

    public static function postPackageInstall(PackageEvent $event)
    {
        $installedPackage = $event->getOperation()->getPackage();
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        var_dump(get_class_methods($installedPackage), get_class_methods($vendorDir));
    }

    public static function warmCache(Event $event)
    {
        // make cache toasty
    }
}