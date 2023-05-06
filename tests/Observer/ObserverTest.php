<?php

namespace App\Tests\Observer;

use App\Observer\Observer;
use App\Observer\Subject;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    public function testObserverNoState() : void
    {
        $subj = new Subject();
        $obj = new Observer(1);
        $subj->attach($obj);

        $this->assertNull($obj->getLastState());
    }
    public function testObserverNotifyState() : void
    {
        $subj = new Subject();
        $obj = new Observer(1);
        $subj->attach($obj, 'change');

        $startedDate = new \DateTime();
        $subj->setState('change');

        $this->assertEquals('change', $subj->getState());
        $this->assertEquals('change', $obj->getLastState());
        $this->assertGreaterThan($startedDate, $obj->getUpdatedAt());
    }

    public function testObserverNotifyAll() : void
    {
        $subj = new Subject();
        $obj = new Observer(1);
        $subj->attach($obj);

        $startedDate = new \DateTime();
        $subj->setState('change');
        $subj->notify();

        $this->assertEquals('change', $obj->getLastState());
        $this->assertGreaterThan($startedDate, $obj->getUpdatedAt());
    }

    public function testRemoveObserver() : void
    {
        $subj = new Subject();
        $obj1 = new Observer(1);
        $obj2 = new Observer(2);
        $obj3 = new Observer(3);
        $subj->attach($obj1);
        $subj->attach($obj2);
        $subj->attach($obj3);

        $subj->detach($obj2);
        $this->assertCount(2, $subj->getObservers());
    }
}
