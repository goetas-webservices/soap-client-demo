# SOAP Client Example

[![Build Status](https://travis-ci.org/goetas-webservices/soap-client-demo.svg?branch=master)](https://travis-ci.org/goetas-webservices/soap-client-demo)

This is an example project on how to use
the [goetas-webservices/soap-client](https://github.com/goetas-webservices/soap-client) project.

## Demo

Steps to use this demo project: 

1. clone this repo
2. run `composer install` to get the dependencies 
3. run `vendor/bin/soap-client -vvv generate config/config.yml src/Container --dest-class=WeatherWS/Container/SoapContainer`
 to generate all the required files
4. run `php bin/demo.php` to see a working demo consuming `http://wsf.cdyne.com/WeatherWS/Weather.asmx?WSDL` Weather 
 forecast SOAP webservice
5. enjoy SOAP again
6. bonus: notice the code and type hinting by PhpStorm on `$client` and `$result` variable :) 

## Dependencies 

Here an explanation of dependencies present in  `composer.json`

- `php` this demo is tested on ^5.5|^7.0 php versions
- `symfony/var-dumper` is optional and is used in this demo ony to color the output on the console
- `goetas-webservices/soap-client` this is the main SOAP client dependency
- `php-http/guzzle6-adapter` your HTTP client implementation, any [php-http client](http://docs.php-http.org/en/latest/clients.html) 
 implementation works fine(I have opted for [guzzle6](https://github.com/guzzle/guzzle), at the moment guzzle, curl, buzz an react clients are supported).
- `php-http/message` PSR-7 http message factories, more info are available on [docs.php-http.org](http://docs.php-http.org/en/latest/httplug/users.html)
- `guzzlehttp/psr7`, my PSR-7 message implementation choice for `php-http/message` 
- `goetas-webservices/wsdl2php` (require-dev) this is the main dev dependency, has to be used during development 
 the generate all the necessary information (php classes, jms mappings, wsdl metadata) used in production

## Ignored files 

Currently `src/*` and `metadata/*` are included in `.gitignore`, I recommend to remove the from the "ignore" file
and to commit to your project the generated files by the command executed at step 3.
