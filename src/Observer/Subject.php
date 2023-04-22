<?php

namespace App\Observer;


class Subject
{
    private array $observers = [];

    private string $state;

    public function getState() : string
    {
        return $this->state;
    }

    public function setState($state) : self
    {
        $this->state = $state;
        $this->notify();

        return $this;
    }

    public function registerObserver(ObserverInterface $observer) : self
    {
        $this->observers[] = $observer;

        return $this;
    }

    public function notify() : self
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }

        return $this;
    }
}
