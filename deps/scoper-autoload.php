<?php

// scoper-autoload.php @generated by PhpScoper

// Backup the autoloaded Composer files
if (isset($GLOBALS['__composer_autoload_files'])) {
    $existingComposerAutoloadFiles = $GLOBALS['__composer_autoload_files'];
}

$loader = require_once __DIR__.'/autoload.php';
// Ensure InstalledVersions is available
$installedVersionsPath = __DIR__.'/composer/InstalledVersions.php';
if (file_exists($installedVersionsPath)) require_once $installedVersionsPath;

// Restore the backup
if (isset($existingComposerAutoloadFiles)) {
    $GLOBALS['__composer_autoload_files'] = $existingComposerAutoloadFiles;
} else {
    unset($GLOBALS['__composer_autoload_files']);
}

// Class aliases. For more information see:
// https://github.com/humbug/php-scoper/blob/master/docs/further-reading.md#class-aliases
if (!function_exists('humbug_phpscoper_expose_class')) {
    function humbug_phpscoper_expose_class(string $exposed, string $prefixed): void {
        if (!class_exists($exposed, false) && !interface_exists($exposed, false) && !trait_exists($exposed, false)) {
            spl_autoload_call($prefixed);
        }
    }
}
humbug_phpscoper_expose_class('Normalizer', 'Packetery\Normalizer');

// Function aliases. For more information see:
// https://github.com/humbug/php-scoper/blob/master/docs/further-reading.md#function-aliases
if (!function_exists('getallheaders')) { function getallheaders() { return \Packetery\getallheaders(...func_get_args()); } }
if (!function_exists('idn_to_ascii')) { function idn_to_ascii() { return \Packetery\idn_to_ascii(...func_get_args()); } }
if (!function_exists('idn_to_utf8')) { function idn_to_utf8() { return \Packetery\idn_to_utf8(...func_get_args()); } }
if (!function_exists('mb_chr')) { function mb_chr() { return \Packetery\mb_chr(...func_get_args()); } }
if (!function_exists('mb_ord')) { function mb_ord() { return \Packetery\mb_ord(...func_get_args()); } }
if (!function_exists('mb_scrub')) { function mb_scrub() { return \Packetery\mb_scrub(...func_get_args()); } }
if (!function_exists('normalizer_is_normalized')) { function normalizer_is_normalized() { return \Packetery\normalizer_is_normalized(...func_get_args()); } }
if (!function_exists('normalizer_normalize')) { function normalizer_normalize() { return \Packetery\normalizer_normalize(...func_get_args()); } }
if (!function_exists('sapi_windows_vt100_support')) { function sapi_windows_vt100_support() { return \Packetery\sapi_windows_vt100_support(...func_get_args()); } }
if (!function_exists('spl_object_id')) { function spl_object_id() { return \Packetery\spl_object_id(...func_get_args()); } }
if (!function_exists('stream_isatty')) { function stream_isatty() { return \Packetery\stream_isatty(...func_get_args()); } }
if (!function_exists('utf8_decode')) { function utf8_decode() { return \Packetery\utf8_decode(...func_get_args()); } }
if (!function_exists('utf8_encode')) { function utf8_encode() { return \Packetery\utf8_encode(...func_get_args()); } }

return $loader;
