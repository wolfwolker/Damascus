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

    public function __construct()
    {
        $this->stack = [];
        $this->next = new MiddlewareStep($this->stack);
    }

    /**
     * Pushes new middlewares to the stack. First pushed middleware will be the outest layer (the first one executed)
     *
     * @param \Damascus\MiddlewareInterface $middleware
     */
    public function pushMiddleware(MiddlewareInterface $middleware)
    {
        $this->stack[] = $middleware;
    }

    /**
     * It starts the chain.
     *
     * @param \Damascus\CommandInterface $command
     */
    public function run(CommandInterface $command)
    {
        $middleware = reset($this->stack);

        if (false !== $middleware) {
            $middleware->run($command, $this->next);
        }
    }
}