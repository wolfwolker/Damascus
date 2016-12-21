<?php

namespace spec\Damascus;

use Damascus\DataBucketInterface;
use Damascus\MiddlewareInterface;
use Damascus\MiddlewareStep;
use Damascus\DataBucket;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MiddlewareStackSpec extends ObjectBehavior
{
    function it_allows_to_push_middlewares(MiddlewareInterface $middleware)
    {
        $this->pushMiddleware($middleware);
    }

    function it_runs_a_stacked_middleware(MiddlewareInterface $middleware, DataBucketInterface $dataBucket)
    {
        $this->it_allows_to_push_middlewares($middleware);

        $middleware->run($dataBucket, Argument::type(MiddlewareStep::class));

        $this->run($dataBucket);
    }
}