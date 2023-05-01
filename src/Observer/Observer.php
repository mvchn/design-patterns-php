<?php

namespace App\Observer;

class Observer implements \SplObserver
{
    private int $id;

    private array $states;

    private string $lastState;

    private \DateTimeInterface $updatedAt;

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

    public function getLastState() : ?string
    {
        if (empty($this->lastState)) {
            return null;
        }

        return $this->lastState;
    }

    public function getUpdatedAt() : ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function update(\SplSubject $subject): void
    {
        if ($subject instanceof SubjectInterface && in_array($subject->getState(), $this->states)) {
            $this->lastState = $subject->getState();
            $this->updatedAt = new \DateTime();
            echo sprintf("Observer #%d receive %s on %s. \n", $this->id, $this->lastState, $this->updatedAt->format('Y-m-d H:i:s'));
        }
    }
}
