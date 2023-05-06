<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Observer\Observer;
use App\Observer\Subject;

$subject = new Subject();
$subject->attach(new Observer(1), '*');
$subject->attach(new Observer(2), '*');
$subject->attach(new Observer(3), '*');
$subject->attach(new Observer(4), '*');

$subject->notify();
