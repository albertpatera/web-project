<?php
use Tester\Assert;;
require __DIR__ . '/../vendor/autoload.php';
$texy = new Texy\Texy;
$texy->htmlOutputModule->lineWrap = 180;
$texy->emoticonModule->root = 'images/images/';
$texy->emoticonModule->class = 'smiley';
$texy->allowed['emoticon'] = true;


$configurator = new Nette\Configurator;
$configurator->setDebugMode(TRUE);
//$configurator->setDebugMode('23.75.345.200'); // enable for your remote IP
$configurator->enableTracy(__DIR__ . '/../log');

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

$container = $configurator->createContainer();

//added editor called Texyx!

return $container;
