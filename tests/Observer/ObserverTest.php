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
        $subj->registerObserver($obj);

        $subj->setState('change');
        $subj->notify();

        $this->assertEquals('change', $subj->getState());
        $this->assertNull($obj->getLastUpdate());
    }

    public function testObserverChangeState() : void
    {
        $subj = new Subject();
        $obj = new Observer(['change']);
        $subj->registerObserver($obj);

        $subj->setState('change');
        $subj->notify();

        $this->assertEquals('change', $obj->getLastUpdate());
    }

    public function testRemoveObserver() : void
    {
        $subj = new Subject();
        $obj1 = new Observer();
        $obj2 = new Observer();
        $obj3 = new Observer();
        $subj->registerObserver($obj1);
        $subj->registerObserver($obj2);
        $subj->registerObserver($obj3);

        $subj->removeObserver($obj2);
        $this->assertCount(2, $subj->getObservers());
    }
}
