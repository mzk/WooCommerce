<?php

namespace Packetery\PhproTest\SoapClient\Unit\CodeGenerator\Assembler;

use Packetery\Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface;
use Packetery\Phpro\SoapClient\CodeGenerator\Assembler\PropertyAssembler;
use Packetery\Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Packetery\Phpro\SoapClient\CodeGenerator\Model\Property;
use Packetery\Phpro\SoapClient\CodeGenerator\Model\Type;
use Packetery\PHPUnit\Framework\TestCase;
use Packetery\Laminas\Code\Generator\ClassGenerator;
use Packetery\Laminas\Code\Generator\PropertyGenerator;
/**
 * Class PropertyAssemblerTest
 *
 * @package PhproTest\SoapClient\Unit\CodeGenerator\Assembler
 * @internal
 */
class PropertyAssemblerTest extends TestCase
{
    /**
     * @test
     */
    function it_is_an_assembler()
    {
        $assembler = new PropertyAssembler();
        $this->assertInstanceOf(AssemblerInterface::class, $assembler);
    }
    /**
     * @test
     */
    function it_assembles_property_without_default_value()
    {
        $assembler = new PropertyAssembler();
        $context = $this->createContext();
        $assembler->assemble($context);
        $code = $context->getClass()->generate();
        $expected = <<<CODE
namespace MyNamespace;

class MyType
{

    /**
     * @var string
     */
    private \$prop1;


}

CODE;
        $this->assertEquals($expected, $code);
    }
    /**
     * @test
     */
    function it_assembles_with_visibility_without_default_value()
    {
        $assembler = new PropertyAssembler(PropertyGenerator::VISIBILITY_PUBLIC);
        $context = $this->createContext();
        $assembler->assemble($context);
        $code = $context->getClass()->generate();
        $expected = <<<CODE
namespace MyNamespace;

class MyType
{

    /**
     * @var string
     */
    public \$prop1;


}

CODE;
        $this->assertEquals($expected, $code);
    }
    /**
     * @test
     */
    function it_assembles_a_doc_block_that_does_not_wrap()
    {
        $assembler = new PropertyAssembler();
        $context = $this->createContextWithLongType();
        $assembler->assemble($context);
        $code = $context->getClass()->generate();
        $expected = <<<CODE
namespace MyNamespace;

class MyType
{

    /**
     * @var \\This\\Is\\My\\Very\\Very\\Long\\Namespace\\And\\Class\\Name\\That\\Should\\Not\\Never\\Ever\\Wrap
     */
    private \$prop1;


}

CODE;
        $this->assertEquals($expected, $code);
    }
    /**
     * @return PropertyContext
     */
    private function createContext()
    {
        $class = new ClassGenerator('MyType', 'MyNamespace');
        $type = new Type('MyNamespace', 'MyType', [$property = new Property('prop1', 'string', 'ns1')]);
        return new PropertyContext($class, $type, $property);
    }
    /**
     * @return PropertyContext
     */
    private function createContextWithLongType()
    {
        $class = new ClassGenerator('MyType', 'MyNamespace');
        $type = new Type('MyNamespace', 'MyType', [$property = new Property('prop1', 'Wrap', 'Packetery\\This\\Is\\My\\Very\\Very\\Long\\Namespace\\And\\Class\\Name\\That\\Should\\Not\\Never\\Ever')]);
        return new PropertyContext($class, $type, $property);
    }
}
