<?php

namespace CurrencyConverter;

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
        if($this->source == "USD" && $this->target == "NPR")
        {
            return $this->currency * 133.11;
        } elseif ($this->source == "NPR" && $this->target == "USD")
        {
            return $this->currency * 0.0075;
        }
    }
}