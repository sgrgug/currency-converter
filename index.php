<?php

require_once __DIR__ . '/src/CurrencyConverter.php';

use Sgrgrg\CurrencyConverter\CurrencyConverter;

echo CurrencyConverter::convert(3)
                        ->from('USD')
                        ->to('NPR')
                        ->get();