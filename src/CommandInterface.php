<?php

namespace Damascus;

/**
 * Interface CommandInterface.
 * Its purpose is to act as a bucket to transport the input and output of the middleware's stack.
 *
 * @package Damascus
 */
interface CommandInterface
{
    public function getInput();
    public function getOutput();
    public function setInput($input);
    public function setOutput($output);
}
