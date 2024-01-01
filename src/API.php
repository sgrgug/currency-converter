<?php

namespace Sgrgrg\CurrencyConverter;

class API 
{
    private $baseURL = "https://api.currencyapi.com/v3/latest";
    private $api_key = "cur_live_qgRBV53kAk4hHnAjLIuAF8POQEpKu5nJbSZnIUqZ";
    private $base_currency;
    private $targetCurrency;
    // private $api_url =  $baseURL . '?apikey=cur_live_qgRBV53kAk4hHnAjLIuAF8POQEpKu5nJbSZnIUqZ&currencies=EUR%2CUSD%2CCAD&base_currency=NPR;

    // public function __construct($base_currency, $targetCurrency)
    // {
    //     $this->base_currency = $base_currency;
    //     $this->targetCurrency = $targetCurrency;
    // }

    public static function base(String $base_currency)
    {
        $instance = new self();
        $instance->base_currency = $base_currency;
        return $instance;
    }

    public function target(String $targetCurrency)
    {
        $this->targetCurrency = $targetCurrency;
        return $this;
    }

    public function get()
    {
        $ch = curl_init();
        $api_url = $this->baseURL . '?apikey=' . $this->api_key . '&currencies=' . $this->targetCurrency . '&base_currency=' . $this->base_currency;

        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $resp = curl_exec($ch);

        if($e = curl_error($ch)) {
            echo $e;
        } else {
            $decoded = json_decode($resp);
        }

        return $decoded->data;
    }
}