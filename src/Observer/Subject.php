<?php

namespace App\Observer;


class Subject
{
    private array $observers = [];

    private string $state;

    public function __construct()
    {
        $this->state = 'new';
    }

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
        $observer->setId($this->getNextId());

        $this->observers[] = $observer;

        return $this;
    }

    public function notify() : self
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->state);
        }

        return $this;
    }

    private function getNextId() : int
    {
        return count($this->observers) == 0 ? 0 : max(array_keys($this->observers)) + 1;
    }
}
