<?php

declare (strict_types=1);
namespace Packetery\Phpro\SoapClient\Soap\Engine;

use Packetery\Phpro\SoapClient\Soap\Engine\Metadata\MetadataInterface;
use Packetery\Phpro\SoapClient\Soap\Handler\HandlerInterface;
use Packetery\Phpro\SoapClient\Soap\HttpBinding\LastRequestInfo;
/** @internal */
class Engine implements EngineInterface
{
    /**
     * @var DriverInterface
     */
    private $driver;
    /**
     * @var HandlerInterface
     */
    private $handler;
    public function __construct(DriverInterface $driver, HandlerInterface $handler)
    {
        $this->driver = $driver;
        $this->handler = $handler;
    }
    public function getMetadata() : MetadataInterface
    {
        return $this->driver->getMetadata();
    }
    public function request(string $method, array $arguments)
    {
        $request = $this->driver->encode($method, $arguments);
        $response = $this->handler->request($request);
        return $this->driver->decode($method, $response);
    }
    public function collectLastRequestInfo() : LastRequestInfo
    {
        return $this->handler->collectLastRequestInfo();
    }
}
