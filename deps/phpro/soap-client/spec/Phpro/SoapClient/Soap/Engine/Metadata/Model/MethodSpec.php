<?php

namespace Packetery\spec\Phpro\SoapClient\Soap\Engine\Metadata\Model;

use Packetery\Phpro\SoapClient\Soap\Engine\Metadata\Model\Parameter;
use Packetery\Phpro\SoapClient\Soap\Engine\Metadata\Model\XsdType;
use Packetery\PhpSpec\ObjectBehavior;
use Packetery\Prophecy\Argument;
use Packetery\Phpro\SoapClient\Soap\Engine\Metadata\Model\Method;
/**
 * Class MethodSpec
 * @internal
 */
class MethodSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('name', [new Parameter('name', XsdType::create('type'))], XsdType::create('returnType'));
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Method::class);
    }
    function it_contains_a_name()
    {
        $this->getName()->shouldBe('name');
    }
    function it_contains_parameters()
    {
        $parameters = $this->getParameters();
        $parameters->shouldHaveCount(1);
        $parameters[0]->shouldHaveType(Parameter::class);
        $parameters[0]->getName()->shouldBe('name');
        $parameters[0]->getType()->shouldBeLike(XsdType::create('type'));
    }
    function it_contains_a_return_type()
    {
        $this->getReturnType()->shouldBeLike(XsdType::create('returnType'));
    }
}
