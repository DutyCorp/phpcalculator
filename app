#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Console\AddCommand;
use Console\SubtractCommand;
use Console\MultiplyCommand;
use Console\DivideCommand;

require_once __DIR__.'/vendor/autoload.php';

$app = new Application('Calculator', '0.4');

$app->add(new AddCommand());
$app->add(new SubtractCommand());
$app->add(new MultiplyCommand());
$app->add(new DivideCommand());

$app->run();
