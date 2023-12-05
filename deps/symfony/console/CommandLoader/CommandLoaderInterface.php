<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Packetery\Symfony\Component\Console\CommandLoader;

use Packetery\Symfony\Component\Console\Command\Command;
use Packetery\Symfony\Component\Console\Exception\CommandNotFoundException;
/**
 * @author Robin Chalas <robin.chalas@gmail.com>
 * @internal
 */
interface CommandLoaderInterface
{
    /**
     * Loads a command.
     *
     * @return Command
     *
     * @throws CommandNotFoundException
     */
    public function get(string $name);
    /**
     * Checks if a command exists.
     *
     * @return bool
     */
    public function has(string $name);
    /**
     * @return string[] All registered command names
     */
    public function getNames();
}