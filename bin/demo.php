<?php
namespace Example;

use GoetasWebservices\SoapServices\SoapClient\ClientFactory;
use GoetasWebservices\SoapServices\SoapCommon\Builder\SoapContainerBuilder;
use Symfony\Component\VarDumper\VarDumper;
use WeatherWS\Container\SoapContainer;

require __DIR__ . '/../vendor/autoload.php';

$container = new SoapContainer();

$serializer = SoapContainerBuilder::createSerializerBuilderFromContainer($container)->build();
$metadata = $container->get('goetas_webservices.soap_client.metadata_reader');

$factory = new ClientFactory($metadata, $serializer);

/**
 * @var $client \WeatherWS\SoapStubs\WeatherSoap
 */
$client = $factory->getClient('http://wsf.cdyne.com/WeatherWS/Weather.asmx?WSDL');

$result = $client->getCityWeatherByZIP("10006");

VarDumper::dump($result);
VarDumper::dump($result->getGetCityWeatherByZIPResult()->getCity());
VarDumper::dump($result->getGetCityWeatherByZIPResult()->getRelativeHumidity());
VarDumper::dump($result->getGetCityWeatherByZIPResult()->getPressure());
VarDumper::dump($result->getGetCityWeatherByZIPResult()->getWeatherID());
