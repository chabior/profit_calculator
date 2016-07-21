<?php

namespace Chabior\ProfitCalculator\Exception;

/**
 * Class InvalidStakeException
 * @package Chabior\ProfitCalculator\Exception
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class InvalidStakeException extends Exception
{
    /**
     * @return InvalidStakeException
     */
    public static function get()
    {
        return new self('Stake should be grater than 0');
    }
}