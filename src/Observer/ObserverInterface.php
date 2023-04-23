<?php

namespace App\Observer;

interface ObserverInterface
{
    public function update(string $state) : void;
}
