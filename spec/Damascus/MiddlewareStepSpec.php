<?php

namespace spec\Damascus;

use Damascus\DataBucketInterface;
use Damascus\MiddlewareInterface;
use Damascus\MiddlewareStep;
use Damascus\DataBucket;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MiddlewareStepSpec extends ObjectBehavior
{
    function it_runs_the_next_middleware(DataBucketInterface $dataBucket, MiddlewareInterface $m1, MiddlewareInterface $m2)
    {
        $stack = [$m1, $m2];
        reset($stack);

        $this->beConstructedWith($stack);
        $m1->run($dataBucket, $this)->shouldNotBeCalled();
        $m2->run($dataBucket, $this)->shouldBeCalled();

        $this->run($dataBucket);
    }
}