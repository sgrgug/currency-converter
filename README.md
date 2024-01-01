
# Currency Converter

A php library for Currency Currency.


## Authors

- [@sgrgug](https://www.github.com/sgrgug)


## Features

- Easy Syntax, Easy to use
- Conversion only NPR, USD, INR


## Installation

Install my-project with npm

```bash
  composer require  sgrgrg/currency-converter
```
    
## Usage/Examples

```php
use Sgrgrg\CurrencyConverter\CurrencyConverter;

echo CurrencyConverter::convert(2)->from('USD')->to('NPR')->get();
```

