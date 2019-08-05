<?php

use Tester\Assert;

# Načteme knihovny Testeru.
require __DIR__ . '/../vendor/autoload.php';       # při instalaci Composerem

# Načteme testovanou třídu. V praxi se o to zřejmě postará Composer
# anebo váš autoloader.
require __DIR__ . '/../src/Greeting.php';


Tester\Environment::setup();

$o = new \Src\Greeting();

Assert::same('Hello John', $o->say(' John'));
Assert::exception(function() use ($o) {       # Očekáváme výjimku
    $o->say('');
}, InvalidArgumentException::class, 'Invalid name');
Assert::notSame('Hello John', $o->say(' John'));
Assert::exception(function() use ($o) {       # Očekáváme výjimku
    $o->say('');
}, InvalidArgumentException::class, 'This name is not same like: ');