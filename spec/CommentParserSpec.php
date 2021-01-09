<?php

namespace spec;

use CommentParser;
use PhpSpec\ObjectBehavior;

class CommentParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CommentParser::class);
    }
    function it_parse_something(){
        $this->parse()->shouldReturn([]);
    }
}
