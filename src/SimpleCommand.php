<?php

namespace Damascus;

/**
 * A simple implementation of a command
 *
 * @package Damascus
 */
class SimpleCommand implements CommandInterface
{
    private $input;
    private $output;

    /**
     * {@inheritDoc}
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * {@inheritDoc}
     */
    public function setInput($input)
    {
        $this->input = $input;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * {@inheritDoc}
     */
    public function setOutput($output)
    {
        $this->output = $output;

        return $this;
    }
}
