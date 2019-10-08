<?php

namespace App\DBAL\Converters;

/**
 * Interface ConverterInterface
 * @package App\DBAL\Converters
 */
interface ConverterInterface
{
    /**
     * @param mixed $value
     * @return mixed
     * @throws \Exception
     */
    public function convert($value);

    /**
     * @param mixed $value
     * @return boolean
     */
    public function accept($value);
}