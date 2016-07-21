<?php

namespace Chabior\ProfitCalculator\Enum;

/**
 * Class TipStatusEnum
 * @package Chabior\ProfitCalculator\Enum
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class TipStatusEnum
{
    const LOST = 0;

    const WON = 1;

    const HALF_LOST = 2;

    const HALF_WON = 3;

    const VOIDED = 4;

    /**
     * @var array
     */
    public static $allowed = array(
        self::LOST => 'lost' ,
        self::WON => 'won',
        self::HALF_LOST => 'half_lost',
        self::HALF_WON => 'half_won',
        self::VOIDED => 'voided',
    );
}