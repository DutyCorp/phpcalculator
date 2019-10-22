#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Console\AddCommand;
use Console\SubtractCommand;

require_once __DIR__.'/vendor/autoload.php';

$app = new Application('Calculator', '0.2');

$app->add(new AddCommand());
$app->add(new SubtractCommand());

$app->run();
