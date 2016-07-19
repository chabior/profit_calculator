<?php

namespace Chabior\ProfitCalculator\Test\Factory;

use Chabior\ProfitCalculator\Calculator\VoidCalculator;
use Chabior\ProfitCalculator\Enum\TipStatusEnum;
use Chabior\ProfitCalculator\Factory\CalculatorFactory;
use Money\Currency;
use phpunit\framework\TestCase;

/**
 * Class CalculatorFactoryTest
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class CalculatorFactoryTest extends TestCase
{
    /**
     * @var CalculatorFactory
     */
    protected $factory;

    public function setUp()
    {
        $this->factory = new CalculatorFactory(new Currency('EUR'));
    }

    /**
     * @param string $status
     * @param string $expected
     * @dataProvider statusFactoryProvider
     */
    public function testCreateFromStatus($status, $expected)
    {
        $this->assertInstanceOf($expected, $this->factory->createForStatus($status));
    }

    /**
     * @return array
     */
    public function statusFactoryProvider()
    {
        return array(
            array(TipStatusEnum::VOIDED, '\Chabior\ProfitCalculator\Calculator\VoidCalculator'),
            array(TipStatusEnum::WON, '\Chabior\ProfitCalculator\Calculator\WinCalculator'),
            array(TipStatusEnum::LOST, '\Chabior\ProfitCalculator\Calculator\LostCalculator'),
            array(TipStatusEnum::HALF_WON, '\Chabior\ProfitCalculator\Calculator\HalfWinCalculator'),
            array(TipStatusEnum::HALF_LOST, '\Chabior\ProfitCalculator\Calculator\HalfLostCalculator'),
        );
    }
}