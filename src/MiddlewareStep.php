<?php

namespace Damascus;

/**
 * Class MiddlewareStep
 *
 * @package Damascus
 * @internal don't use this, use MiddlewareStack
 */
class MiddlewareStep
{
    /** @var MiddlewareInterface[] */
    private $stack;

    /**
     * MiddlewareStep constructor.
     *
     * @param MiddlewareInterface[] $stack
     */
    public function __construct(array &$stack)
    {
        $this->stack = $stack;
    }

    /**
     * It runs the next middleware in the stack
     *
     * @param \Damascus\DataBucketInterface $dataBucket
     */
    public function run(DataBucketInterface $dataBucket)
    {
        $middleware = next($this->stack);

        if (false !== $middleware) {
            $middleware->run($dataBucket, $this);
        }
    }
}