<?php

namespace App\Observer;

interface SubjectInterface
{
    public function getState(): string;
}
