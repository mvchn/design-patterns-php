<?php

namespace App\Observer;

class Observer implements ObserverInterface
{
    public function update() : void
    {
        echo 'Observer updated';
    }
}
