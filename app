#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Console\AddCommand;
use Console\SubtractCommand;
use Console\MultiplyCommand;

require_once __DIR__.'/vendor/autoload.php';

$app = new Application('Calculator', '0.3');

$app->add(new AddCommand());
$app->add(new SubtractCommand());
$app->add(new MultiplyCommand());

$app->run();
