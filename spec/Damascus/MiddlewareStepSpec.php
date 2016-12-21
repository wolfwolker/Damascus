<?php

namespace spec\Damascus;

use Damascus\CommandInterface;
use Damascus\MiddlewareInterface;
use Damascus\MiddlewareStep;
use Damascus\SimpleCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MiddlewareStepSpec extends ObjectBehavior
{
    function it_runs_the_next_middleware(CommandInterface $command, MiddlewareInterface $m1, MiddlewareInterface $m2)
    {
        $stack = [$m1, $m2];
        reset($stack);

        $this->beConstructedWith($stack);
        $m1->run($command, $this)->shouldNotBeCalled();
        $m2->run($command, $this)->shouldBeCalled();

        $this->run($command);
    }
}