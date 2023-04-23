<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Observer\Observer;
use App\Observer\Subject;

$subject = new Subject();
$subject->registerObserver(new Observer());
$subject->registerObserver(new Observer());
$subject->registerObserver(new Observer());
$subject->registerObserver(new Observer());

$subject->notify();
