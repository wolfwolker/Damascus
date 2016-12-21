<?php

namespace spec\Damascus;

use Damascus\CommandInterface;
use Damascus\MiddlewareInterface;
use Damascus\MiddlewareStep;
use Damascus\SimpleCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MiddlewareStackSpec extends ObjectBehavior
{
    function it_allows_to_push_middlewares(MiddlewareInterface $middleware)
    {
        $this->pushMiddleware($middleware);
    }

    function it_runs_a_stacked_middleware(MiddlewareInterface $middleware, CommandInterface $command)
    {
        $this->it_allows_to_push_middlewares($middleware);

        $middleware->run($command, Argument::type(MiddlewareStep::class));

        $this->run($command);
    }
}