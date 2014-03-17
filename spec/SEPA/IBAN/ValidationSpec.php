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
            ->valid('AL47 2121 1009 0000 0002 3569 8741')
            ->shouldReturn(true);
    }

    function it_should_have_a_valid_method()
    {
        $this->valid('DE89 3704 0044 0532 0130 00');
    }

    function it_should_have_a_is_valid_method()
    {
        $this->is_valid('DE89 3704 0044 0532 0130 00');
    }

    function it_should_return_true_on_valid_IBAN()
    {
        $this->valid('AL47 2121 1009 0000 0002 3569 8741')->shouldReturn(true);
        $this->valid('AD12 0001 2030 2003 5910 0100')->shouldReturn(true);
        $this->valid('AT61 1904 3002 3457 3201')->shouldReturn(true);
        $this->valid('AZ21 NABZ 0000 0000 1370 1000 1944')->shouldReturn(true);
        $this->valid('BH67 BMAG 0000 1299 1234 56')->shouldReturn(true);
        $this->valid('BE62 5100 0754 7061')->shouldReturn(true);
        $this->valid('BA39 1290 0794 0102 8494')->shouldReturn(true);
        $this->valid('BG80 BNBG 9661 1020 3456 78')->shouldReturn(true);
        $this->valid('HR12 1001 0051 8630 0016 0')->shouldReturn(true);
        $this->valid('CY17 0020 0128 0000 0012 0052 7600')->shouldReturn(true);
        $this->valid('CZ65 0800 0000 1920 0014 5399')->shouldReturn(true);
        $this->valid('DK50 0040 0440 1162 43')->shouldReturn(true);
        $this->valid('EE38 2200 2210 2014 5685')->shouldReturn(true);
        $this->valid('FO97 5432 0388 8999 44')->shouldReturn(true);
        $this->valid('FI21 1234 5600 0007 85')->shouldReturn(true);
        $this->valid('FR14 2004 1010 0505 0001 3M02 606')->shouldReturn(true);
        $this->valid('GE29 NB00 0000 0101 9049 17')->shouldReturn(true);
        $this->valid('DE89 3704 0044 0532 0130 00')->shouldReturn(true);
        $this->valid('GI75 NWBK 0000 0000 7099 453')->shouldReturn(true);
        $this->valid('GR16 0110 1250 0000 0001 2300 695')->shouldReturn(true);
        $this->valid('GL56 0444 9876 5432 10')->shouldReturn(true);
        $this->valid('HU42 1177 3016 1111 1018 0000 0000')->shouldReturn(true);
        $this->valid('IS14 0159 2600 7654 5510 7303 39')->shouldReturn(true);
        $this->valid('IE29 AIBK 9311 5212 3456 78')->shouldReturn(true);
        $this->valid('IL62 0108 0000 0009 9999 999')->shouldReturn(true);
        $this->valid('IT40 S054 2811 1010 0000 0123 456')->shouldReturn(true);
        $this->valid('JO94 CBJO 0010 0000 0000 0131 0003 02')->shouldReturn(true);
        $this->valid('KW81 CBKU 0000 0000 0000 1234 5601 01')->shouldReturn(true);
        $this->valid('LV80 BANK 0000 4351 9500 1')->shouldReturn(true);
        $this->valid('LB62 0999 0000 0001 0019 0122 9114')->shouldReturn(true);
        $this->valid('LI21 0881 0000 2324 013A A')->shouldReturn(true);
        $this->valid('LT12 1000 0111 0100 1000')->shouldReturn(true);
        $this->valid('LU28 0019 4006 4475 0000')->shouldReturn(true);
        $this->valid('MK072 5012 0000 0589 84')->shouldReturn(true);
        $this->valid('MT84 MALT 0110 0001 2345 MTLC AST0 01S')->shouldReturn(true);
        $this->valid('MU17 BOMM 0101 1010 3030 0200 000M UR')->shouldReturn(true);
        $this->valid('MD24 AG00 0225 1000 1310 4168')->shouldReturn(true);
        $this->valid('MC93 2005 2222 1001 1223 3M44 555')->shouldReturn(true);
        $this->valid('ME25 5050 0001 2345 6789 51')->shouldReturn(true);
        $this->valid('NL39 RABO 0300 0652 64')->shouldReturn(true);
        $this->valid('NO93 8601 1117 947')->shouldReturn(true);
        $this->valid('PK36 SCBL 0000 0011 2345 6702')->shouldReturn(true);
        $this->valid('PL60 1020 1026 0000 0422 7020 1111')->shouldReturn(true);
        $this->valid('PT50 0002 0123 1234 5678 9015 4')->shouldReturn(true);
        $this->valid('QA58 DOHB 0000 1234 5678 90AB CDEF G')->shouldReturn(true);
        $this->valid('RO49 AAAA 1B31 0075 9384 0000')->shouldReturn(true);
        $this->valid('SM86 U032 2509 8000 0000 0270 100')->shouldReturn(true);
        $this->valid('SA03 8000 0000 6080 1016 7519')->shouldReturn(true);
        $this->valid('RS35 2600 0560 1001 6113 79')->shouldReturn(true);
        $this->valid('SK31 1200 0000 1987 4263 7541')->shouldReturn(true);
        $this->valid('SI56 1910 0000 0123 438')->shouldReturn(true);
        $this->valid('ES80 2310 0001 1800 0001 2345')->shouldReturn(true);
        $this->valid('SE35 5000 0000 0549 1000 0003')->shouldReturn(true);
        $this->valid('CH93 0076 2011 6238 5295 7')->shouldReturn(true);
        $this->valid('TN59 1000 6035 1835 9847 8831')->shouldReturn(true);
        $this->valid('TR33 0006 1005 1978 6457 8413 26')->shouldReturn(true);
        $this->valid('AE07 0331 2345 6789 0123 456')->shouldReturn(true);
        $this->valid('GB29 NWBK 6016 1331 9268 19')->shouldReturn(true);
    }

    function it_should_throw_an_exception_on_wrong_IBAN()
    {
        $this
            ->shouldThrow('SEPA\IBAN\Invalid\Exception')
            ->duringValid('DE89 3704 0044 0532 0190 00');
    }

    function it_should_return_false_on_wrong_IBAN()
    {
        $this->is_valid('DE89 3704 0044 0532 0190 00')
            ->shouldReturn(false);
    }
}