<?php

namespace Damascus;

/**
 * Class MiddlewareStack.
 * This is your entry point to execute the middleware's chain
 *
 * @package Damascus
 */
class MiddlewareStack
{
    /** @var MiddlewareInterface[] */
    private $stack;

    /** @var  MiddlewareStep */
    private $next;

    public function __construct(array $middlewares = [])
    {
        $this->stack = [];
        foreach ($middlewares as $middleware) {
            $this->pushMiddleware($middleware);
        }
        $this->next = new MiddlewareStep($this->stack);
    }

    /**
     * Pushes new middlewares to the stack. First pushed middleware will be the outest layer (the first one executed)
     *
     * @param \Damascus\MiddlewareInterface $middleware
     *
     * @return $this
     */
    public function pushMiddleware(MiddlewareInterface $middleware)
    {
        $this->stack[] = $middleware;

        return $this;
    }

    /**
     * It starts the chain.
     *
     * @param \Damascus\DataBucketInterface $dataBucket
     */
    public function run(DataBucketInterface $dataBucket)
    {
        $middleware = reset($this->stack);

        if (false !== $middleware) {
            $middleware->run($dataBucket, $this->next);
        }
    }
}
