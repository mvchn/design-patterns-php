<?php

namespace App\Observer;


class Subject
{
    const EVENT_ALL = '*';

    private array $observers = [];

    private string $state;

    public function __construct()
    {
        $this->state = 'new';
        $this->observers[self::EVENT_ALL] = [];
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

        $this->observers[self::EVENT_ALL][] = $observer;

        return $this;
    }

    public function removeObserver(ObserverInterface $observer) : self
    {
        foreach ($this->observers[self::EVENT_ALL] as $key => $obs) {
            if ($obs->getId() == $observer->getId()) {
                unset($this->observers[self::EVENT_ALL][$key]);
            }
        }

        return $this;
    }

    public function getObservers() : array
    {
        return $this->observers[self::EVENT_ALL];
    }

    public function notify() : self
    {
        foreach ($this->observers[self::EVENT_ALL] as $observer) {
            $observer->update($this->state);
        }

        return $this;
    }

    private function getNextId() : int
    {
        return count($this->observers[self::EVENT_ALL]) == 0 ? 0 : max(array_keys($this->observers[self::EVENT_ALL])) + 1;
    }
}
