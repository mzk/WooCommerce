<?php

namespace Packetery\spec\Phpro\SoapClient\Exception;

use Packetery\Phpro\SoapClient\Exception\RuntimeException;
use Packetery\PhpSpec\ObjectBehavior;
use Packetery\Prophecy\Argument;
use Packetery\Phpro\SoapClient\Exception\AssemblerException;
/** @internal */
class AssemblerExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AssemblerException::class);
    }
    function it_should_be_an_exception()
    {
        $this->shouldHaveType(RuntimeException::class);
    }
}