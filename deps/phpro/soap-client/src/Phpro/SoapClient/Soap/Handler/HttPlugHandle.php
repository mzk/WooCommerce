<?php

declare (strict_types=1);
namespace Packetery\Phpro\SoapClient\Soap\Handler;

use Packetery\Http\Client\Common\PluginClient;
use Packetery\Http\Discovery\HttpClientDiscovery;
use Packetery\Http\Discovery\MessageFactoryDiscovery;
use Packetery\Http\Discovery\StreamFactoryDiscovery;
use Packetery\Phpro\SoapClient\Middleware\CollectLastRequestInfoMiddleware;
use Packetery\Phpro\SoapClient\Middleware\MiddlewareInterface;
use Packetery\Phpro\SoapClient\Middleware\MiddlewareSupportingInterface;
use Packetery\Phpro\SoapClient\Soap\HttpBinding\Converter\Psr7Converter;
use Packetery\Phpro\SoapClient\Soap\HttpBinding\LastRequestInfo;
use Packetery\Phpro\SoapClient\Soap\HttpBinding\SoapRequest;
use Packetery\Phpro\SoapClient\Soap\HttpBinding\SoapResponse;
use Packetery\Psr\Http\Client\ClientInterface;
/** @internal */
class HttPlugHandle implements HandlerInterface, MiddlewareSupportingInterface
{
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var LastRequestInfoCollectorInterface
     */
    private $lastRequestInfoCollector;
    /**
     * @var Psr7Converter
     */
    private $converter;
    /**
     * @var array
     */
    private $middlewares = [];
    public function __construct(ClientInterface $client, Psr7Converter $converter, CollectLastRequestInfoMiddleware $lastRequestInfoCollector)
    {
        $this->client = $client;
        $this->converter = $converter;
        $this->lastRequestInfoCollector = $lastRequestInfoCollector;
    }
    public static function createWithDefaultClient() : HttPlugHandle
    {
        return self::createForClient(HttpClientDiscovery::find());
    }
    public static function createForClient(ClientInterface $client) : HttPlugHandle
    {
        return new self($client, new Psr7Converter(MessageFactoryDiscovery::find(), StreamFactoryDiscovery::find()), new CollectLastRequestInfoMiddleware());
    }
    public function addMiddleware(MiddlewareInterface $middleware)
    {
        $this->middlewares[$middleware->getName()] = $middleware;
    }
    public function request(SoapRequest $request) : SoapResponse
    {
        $client = new PluginClient($this->client, \array_merge(\array_values($this->middlewares), [$this->lastRequestInfoCollector]));
        $psr7Request = $this->converter->convertSoapRequest($request);
        $psr7Response = $client->sendRequest($psr7Request);
        return $this->converter->convertSoapResponse($psr7Response);
    }
    public function collectLastRequestInfo() : LastRequestInfo
    {
        return $this->lastRequestInfoCollector->collectLastRequestInfo();
    }
}
