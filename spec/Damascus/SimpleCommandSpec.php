<?php

namespace spec\Damascus;

use PhpSpec\ObjectBehavior;

class SimpleCommandSpec extends ObjectBehavior
{
    function it_keeps_input()
    {
        $this->setInput('foo')->getInput()->shouldReturn('foo');
    }

    function it_keeps_output()
    {
        $this->setOutput('bar')->getOutput()->shouldReturn('bar');
    }
}