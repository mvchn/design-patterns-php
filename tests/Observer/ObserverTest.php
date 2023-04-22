<?php

namespace App\tests\Observer;

use App\Observer\Observer;
use App\Observer\Subject;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    public function testObserver()
    {
        $subj = new Subject();
        $subj->registerObserver(new Observer());

        $subj->setState('new');
        $subj->notify();

        $this->assertEquals('new', $subj->getState());
    }
}
