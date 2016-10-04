<?php
namespace Example;


use GoetasWebservices\SoapServices\SoapClient\ClientFactory;
use GoetasWebservices\SoapServices\SoapCommon\Builder\SoapContainerBuilder;
use Symfony\Component\VarDumper\VarDumper;

// the metadata container
use Service\Container\SoapContainer;

// soap stubs
use WeatherWS\SoapStubs\WeatherSoap;
use Calculator\SoapStubs\CalculatorSoap;

require __DIR__ . '/../vendor/autoload.php';

$container = new SoapContainer();

$serializer = SoapContainerBuilder::createSerializerBuilderFromContainer($container)->build();
$metadata = $container->get('goetas_webservices.soap_client.metadata_reader');

$factory = new ClientFactory($metadata, $serializer);

/**
 * @var $client CalculatorSoap
 */
$client = $factory->getClient('http://www.dneonline.com/calculator.asmx?WSDL', "CalculatorSoap", "Calculator");

$result = $client->add(1,5);

VarDumper::dump($result);
VarDumper::dump($result->getAddResult());

exit(0);

/**
 * @var $client WeatherSoap
 */
$client = $factory->getClient('http://wsf.cdyne.com/WeatherWS/Weather.asmx?WSDL', "WeatherSoap", "Weather");

$result = $client->getCityWeatherByZIP("10006");

VarDumper::dump($result);
VarDumper::dump($result->getGetCityWeatherByZIPResult()->getCity());
VarDumper::dump($result->getGetCityWeatherByZIPResult()->getRelativeHumidity());
VarDumper::dump($result->getGetCityWeatherByZIPResult()->getPressure());
VarDumper::dump($result->getGetCityWeatherByZIPResult()->getWeatherID());
