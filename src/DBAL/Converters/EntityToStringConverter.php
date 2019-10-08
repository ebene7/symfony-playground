<?php

namespace App\DBAL\Converters;

/**
 * Class EntityToStringConverter
 * @package App\DBAL\Converters
 */
class EntityToStringConverter extends AbstractConverter
{
    /**
     * @inheritDoc
     */
    protected function doConvert($value)
    {
        if (!$this->accept($value)) {
            throw new \Exception();
        }

        return get_class($value) . ':' . $value->getId();
    }

    /**
     * @inheritDoc
     */
    public function accept($value)
    {
        return is_object($value) && method_exists($value, 'getId');
    }
}
