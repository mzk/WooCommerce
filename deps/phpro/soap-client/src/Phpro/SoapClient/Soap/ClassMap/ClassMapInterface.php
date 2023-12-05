<?php

namespace Packetery\Phpro\SoapClient\Soap\ClassMap;

/**
 * Class ClassMapInterface
 *
 * @package Phpro\SoapClient\Soap\ClassMap
 * @internal
 */
interface ClassMapInterface
{
    /**
     * @return string|null
     */
    public function getWsdlType();
    /**
     * @return string
     */
    public function getPhpClassName() : string;
}