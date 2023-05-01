<?php

namespace App\Observer;


class Subject implements \SplSubject, SubjectInterface
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

    public function setState(string $state) : self
    {
        $this->state = $state;
        $this->notify();

        return $this;
    }

    public function attach(\SplObserver $observer, string $event = self::EVENT_ALL): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }

        $this->observers[$event][] = $observer;
    }

    public function detach(\SplObserver $observer, string $event = self::EVENT_ALL): void
    {
        foreach ($this->observers[$event] as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    public function getObservers(string $event = self::EVENT_ALL) : array
    {
        return $this->observers[$event];
    }

    public function notify(string $event = self::EVENT_ALL): void
    {
        $observers = array_merge($this->observers[$event], $this->observers[self::EVENT_ALL]);

        foreach ($observers as $observer) {
            $observer->update($this);
        }
    }
}
