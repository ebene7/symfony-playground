<?php

namespace App\DBAL\Event;

use Doctrine\Common\EventArgs;

/**
 * Class TypeMapperEvent
 * @package App\DBAL\Event
 */
class TypeMapperEventArgs extends EventArgs
{
    const NAME = 'onMapping';
    const TO_DB_VALUE = 'todbvalue';
    const TO_PHP_VALUE = 'tophpvalue';

    /** @var string */
    private $name;

    /** @var mixed */
    private $value;

    /** @var mixed */
    private $result;

    /**
     * TypeMapperEvent constructor.
     * @param string $name
     * @param mixed  $value
     */
    public function __construct(string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     * @return TypeMapperEventArgs
     */
    public function setResult($result): TypeMapperEventArgs
    {
        $this->result = $result;
        return $this;
    }
}
