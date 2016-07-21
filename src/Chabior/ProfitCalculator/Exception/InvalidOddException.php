<?php

namespace Chabior\ProfitCalculator\Exception;

/**
 * Class InvalidOddException
 * @package Chabior\ProfitCalculator\Exception
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class InvalidOddException extends Exception
{
    /**
     * @return InvalidOddException
     */
    public static function get()
    {
        return new self('Odd should be grater than 0.');
    }
}