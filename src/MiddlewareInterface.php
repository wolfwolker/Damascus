<?php

namespace Damascus;

/**
 * Interface MiddlewareInterface.
 * Implement it to create middlewares.
 *
 * @package Damascus
 */
interface MiddlewareInterface
{
    /**
     * @param \Damascus\CommandInterface $command
     * @param \Damascus\MiddlewareStep $next
     *
     * @return void
     */
    public function run(CommandInterface $command, MiddlewareStep $next);
}
