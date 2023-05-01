<?php

namespace App\Tests\Observer;

use App\Observer\Observer;
use App\Observer\Subject;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    public function testObserverDefaultState() : void
    {
        $subj = new Subject();
        $obj = new Observer();
        $subj->attach($obj);

        $subj->setState('change');
        $subj->notify();

        $this->assertEquals('change', $subj->getState());
        $this->assertNull($obj->getLastState());
    }

    public function testObserverChangeState() : void
    {
        $subj = new Subject();
        $obj = new Observer(['change']);
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
        $obj1 = new Observer();
        $obj2 = new Observer();
        $obj3 = new Observer();
        $subj->attach($obj1);
        $subj->attach($obj2);
        $subj->attach($obj3);

        $subj->detach($obj2);
        $this->assertCount(2, $subj->getObservers());
    }
}
