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
     * @param \Damascus\DataBucketInterface $dataBucket
     * @param \Damascus\MiddlewareStep $next
     *
     * @return void
     */
    public function run(DataBucketInterface $dataBucket, MiddlewareStep $next);
}
