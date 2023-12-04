<?php

namespace Packetery\Phpro\SoapClient\Type;

/**
 * Class MixedResult
 *
 * @package Phpro\SoapClient\Type
 * @internal
 */
class MixedResult implements ResultInterface
{
    /**
     * @var mixed
     */
    private $result;
    /**
     * MixedResult constructor.
     *
     * @param mixed $result
     */
    public function __construct($result)
    {
        $this->result = $result;
    }
    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }
}
