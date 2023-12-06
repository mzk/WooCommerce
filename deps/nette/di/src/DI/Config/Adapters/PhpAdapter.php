<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */
declare (strict_types=1);
namespace Packetery\Nette\DI\Config\Adapters;

use Packetery\Nette;
/**
 * Reading and generating PHP files.
 */
final class PhpAdapter implements \Packetery\Nette\DI\Config\Adapter
{
    use \Packetery\Nette\SmartObject;
    /**
     * Reads configuration from PHP file.
     */
    public function load(string $file) : array
    {
        return require $file;
    }
    /**
     * Generates configuration in PHP format.
     */
    public function dump(array $data) : string
    {
        return "<?php // generated by Nette \nreturn " . \Packetery\Nette\PhpGenerator\Helpers::dump($data) . ';';
    }
}
