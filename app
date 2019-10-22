#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Calculator\AddCommand;
use Calculator\SubtractCommand;
use Calculator\MultiplyCommand;
use Calculator\DivideCommand;
use Calculator\PowCommand;
use Calculator\HistoryListCommand;
use Calculator\HistoryClearCommand;

require_once __DIR__.'/vendor/autoload.php';

$app = new Application('Calculator', '0.6');

$app->add(new AddCommand());
$app->add(new SubtractCommand());
$app->add(new MultiplyCommand());
$app->add(new DivideCommand());
$app->add(new PowCommand());
$app->add(new HistoryListCommand());
$app->add(new HistoryClearCommand());

$app->run();
