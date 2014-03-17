<?php

namespace spec\SEPA\IBAN\Invalid;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SEPA\IBAN\Invalid\Exception');
    }

    function it_should_extend_standard_exceptions()
    {
        $this->shouldHaveType('Exception');
    }
}