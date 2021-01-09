<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use PrimeFactors;

class PrimeFactorsSpec extends ObjectBehavior
{
    function it_return_an_empty_array_for_1 ()
    {
        $this->generate(1)->shouldReturn([]);
    }

    function it_return_2_for_2 ()
    {
        $this->generate(2)->shouldReturn(2);
    }

    function it_return_3_for_3 ()
    {
        $this->generate(3)->shouldReturn(3);
    }

    function it_return_2_2_for_4 ()
    {
        $this->generate(4)->shouldReturn([2,2]);
    }

    function it_return_5_for_5 ()
    {
        $this->generate(5)->shouldReturn(5);
    }

    function it_return_6_for_6 ()
    {
        $this->generate(6)->shouldReturn(6);
    }
}
