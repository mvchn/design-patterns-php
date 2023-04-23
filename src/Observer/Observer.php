<?php

namespace App\Observer;

class Observer implements ObserverInterface
{
    private int $id;
    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function update(string $state) : void
    {
        echo sprintf("Observer #%d receive %s. \n", $this->id, $state);
    }
}
