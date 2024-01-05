<?php

use PHPUnit\Framework\TestCase;
use Sgrgrg\CurrencyConverter\CurrencyConverter;
use Sgrgrg\CurrencyConverter\API;

class CurrencyConverterTest extends TestCase
{
    public function testConvert()
    {
        $currencyValue = API::base('NPR')->target('USD')->get();
        foreach($currencyValue as $key => $value){
            $val = $value->value;

            if($key == 1){
                break;
            }
        }

        $converter = CurrencyConverter::convert(100)->from('NPR')->to('USD')->get();

        $this->assertEquals(number_format($val * 100, 3), $converter, 3);
    }
}