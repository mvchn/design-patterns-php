<?php

namespace App\Observer;

class Observer implements ObserverInterface
{
    private int $id;

    private array $states;

    private string $lastUpdate;

    public function __construct(array $states = [])
    {
        $this->id = 0;
        $this->states = $states;
    }

    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getLastUpdate() : ?string
    {
        if (empty($this->lastUpdate)) {
            return null;
        }

        return $this->lastUpdate;
    }

    public function update(string $state) : void
    {
        if (in_array($state, $this->states)) {
            $this->lastUpdate = $state;
            echo sprintf("Observer #%d receive %s. \n", $this->id, $this->lastUpdate);
        }
    }
}
