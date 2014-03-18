<?php

namespace spec\Sepa\IBAN;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SEPA\IBAN\Validation');
    }

    function it_should_have_a_static_factory_method()
    {
        $this::factory()->shouldHaveType('SEPA\IBAN\Validation');
        $this::factory()
            ->check('AL47 2121 1009 0000 0002 3569 8741')
            ->shouldReturn(true);
    }

    function it_should_have_a_check_method()
    {
        $this->check('DE89 3704 0044 0532 0130 00');
    }

    function it_should_have_a_isValid_method()
    {
        $this->isValid('DE89 3704 0044 0532 0130 00');
    }

    function it_should_return_true_on_valid_IBAN()
    {
        $this->check('AL47 2121 1009 0000 0002 3569 8741')->shouldReturn(true);
        $this->check('AD12 0001 2030 2003 5910 0100')->shouldReturn(true);
        $this->check('AT61 1904 3002 3457 3201')->shouldReturn(true);
        $this->check('AZ21 NABZ 0000 0000 1370 1000 1944')->shouldReturn(true);
        $this->check('BH67 BMAG 0000 1299 1234 56')->shouldReturn(true);
        $this->check('BE62 5100 0754 7061')->shouldReturn(true);
        $this->check('BA39 1290 0794 0102 8494')->shouldReturn(true);
        $this->check('BG80 BNBG 9661 1020 3456 78')->shouldReturn(true);
        $this->check('HR12 1001 0051 8630 0016 0')->shouldReturn(true);
        $this->check('CY17 0020 0128 0000 0012 0052 7600')->shouldReturn(true);
        $this->check('CZ65 0800 0000 1920 0014 5399')->shouldReturn(true);
        $this->check('DK50 0040 0440 1162 43')->shouldReturn(true);
        $this->check('EE38 2200 2210 2014 5685')->shouldReturn(true);
        $this->check('FO97 5432 0388 8999 44')->shouldReturn(true);
        $this->check('FI21 1234 5600 0007 85')->shouldReturn(true);
        $this->check('FR14 2004 1010 0505 0001 3M02 606')->shouldReturn(true);
        $this->check('GE29 NB00 0000 0101 9049 17')->shouldReturn(true);
        $this->check('DE89 3704 0044 0532 0130 00')->shouldReturn(true);
        $this->check('GI75 NWBK 0000 0000 7099 453')->shouldReturn(true);
        $this->check('GR16 0110 1250 0000 0001 2300 695')->shouldReturn(true);
        $this->check('GL56 0444 9876 5432 10')->shouldReturn(true);
        $this->check('HU42 1177 3016 1111 1018 0000 0000')->shouldReturn(true);
        $this->check('IS14 0159 2600 7654 5510 7303 39')->shouldReturn(true);
        $this->check('IE29 AIBK 9311 5212 3456 78')->shouldReturn(true);
        $this->check('IL62 0108 0000 0009 9999 999')->shouldReturn(true);
        $this->check('IT40 S054 2811 1010 0000 0123 456')->shouldReturn(true);
        $this->check('JO94 CBJO 0010 0000 0000 0131 0003 02')->shouldReturn(true);
        $this->check('KW81 CBKU 0000 0000 0000 1234 5601 01')->shouldReturn(true);
        $this->check('LV80 BANK 0000 4351 9500 1')->shouldReturn(true);
        $this->check('LB62 0999 0000 0001 0019 0122 9114')->shouldReturn(true);
        $this->check('LI21 0881 0000 2324 013A A')->shouldReturn(true);
        $this->check('LT12 1000 0111 0100 1000')->shouldReturn(true);
        $this->check('LU28 0019 4006 4475 0000')->shouldReturn(true);
        $this->check('MK072 5012 0000 0589 84')->shouldReturn(true);
        $this->check('MT84 MALT 0110 0001 2345 MTLC AST0 01S')->shouldReturn(true);
        $this->check('MU17 BOMM 0101 1010 3030 0200 000M UR')->shouldReturn(true);
        $this->check('MD24 AG00 0225 1000 1310 4168')->shouldReturn(true);
        $this->check('MC93 2005 2222 1001 1223 3M44 555')->shouldReturn(true);
        $this->check('ME25 5050 0001 2345 6789 51')->shouldReturn(true);
        $this->check('NL39 RABO 0300 0652 64')->shouldReturn(true);
        $this->check('NO93 8601 1117 947')->shouldReturn(true);
        $this->check('PK36 SCBL 0000 0011 2345 6702')->shouldReturn(true);
        $this->check('PL60 1020 1026 0000 0422 7020 1111')->shouldReturn(true);
        $this->check('PT50 0002 0123 1234 5678 9015 4')->shouldReturn(true);
        $this->check('QA58 DOHB 0000 1234 5678 90AB CDEF G')->shouldReturn(true);
        $this->check('RO49 AAAA 1B31 0075 9384 0000')->shouldReturn(true);
        $this->check('SM86 U032 2509 8000 0000 0270 100')->shouldReturn(true);
        $this->check('SA03 8000 0000 6080 1016 7519')->shouldReturn(true);
        $this->check('RS35 2600 0560 1001 6113 79')->shouldReturn(true);
        $this->check('SK31 1200 0000 1987 4263 7541')->shouldReturn(true);
        $this->check('SI56 1910 0000 0123 438')->shouldReturn(true);
        $this->check('ES80 2310 0001 1800 0001 2345')->shouldReturn(true);
        $this->check('SE35 5000 0000 0549 1000 0003')->shouldReturn(true);
        $this->check('CH93 0076 2011 6238 5295 7')->shouldReturn(true);
        $this->check('TN59 1000 6035 1835 9847 8831')->shouldReturn(true);
        $this->check('TR33 0006 1005 1978 6457 8413 26')->shouldReturn(true);
        $this->check('AE07 0331 2345 6789 0123 456')->shouldReturn(true);
        $this->check('GB29 NWBK 6016 1331 9268 19')->shouldReturn(true);
    }

    function it_should_throw_an_exception_on_wrong_IBAN()
    {
        $this
            ->shouldThrow('SEPA\IBAN\Invalid\Exception')
            ->duringCheck('DE89 3704 0044 0532 0190 00');
    }

    function it_should_return_false_on_wrong_IBAN()
    {
        $this->isValid('DE89 3704 0044 0532 0190 00')
            ->shouldReturn(false);
    }
}