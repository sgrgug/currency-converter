<?php

namespace Sgrgrg\CurrencyConverter;

// use Sgrgrg\CurrencyConverter\API;
require_once __DIR__ . '/API.php';

class CurrencyConverter
{
    protected $currency;
    protected $source;
    protected $target;

    protected $currencyList = [
        'NPR',
        'USD',
        'INR'
    ];

    public static function convert($currency){
        $instance = new self();
        $instance->currency = $currency;
        return $instance;
    }

    public function from($source)
    {
        if(!in_array($source, $this->currencyList)){
            throw new \Exception("Invalid Soure Currency");
        }

        $this->source = $source;
        return $this;
    }

    public function to($target)
    {
        if(!in_array($target, $this->currencyList)){
            throw new \Exception("Invalid Target Currency");
        }

        $this->target = $target;
        return $this;
    }

    public function get()
    {
        $currencyValue = API::base($this->source)->target($this->target)->get();

        foreach($currencyValue as $key => $value){
            $val = $value->value;

            if($key == 1){
                break;
            }
        }

        return number_format($val * $this->currency, 3);

    }
}