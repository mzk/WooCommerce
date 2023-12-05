<?php

/**
 * @see       https://github.com/laminas/laminas-code for the canonical source repository
 * @copyright https://github.com/laminas/laminas-code/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-code/blob/master/LICENSE.md New BSD License
 */
namespace Packetery\Laminas\Code\Reflection\DocBlock\Tag;

use Packetery\Laminas\Code\Generic\Prototype\PrototypeInterface;
/** @internal */
interface TagInterface extends PrototypeInterface
{
    /**
     * @param  string $content
     * @return void
     */
    public function initialize($content);
}