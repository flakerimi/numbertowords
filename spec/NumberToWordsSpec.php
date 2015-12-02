<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Number;
use Base;

class NumberToWordsSpec extends ObjectBehavior
{

    function it_should_work_for_single_numbers()
    {
        $this->parse(2)->shouldReturn("dy");
        $this->parse(4)->shouldReturn("kater");
    }

    function it_should_work_for_10()
    {
        $this->parse(10)->shouldReturn("dhjete");
    }


    function it_should_work_for_0()
    {
        $this->parse(0)->shouldReturn("zero");
    }

    function it_should_work_for_numbers_11_19()
    {
        $this->parse(11)->shouldReturn("njembedhjete");
        $this->parse(14)->shouldReturn("katermbedhjete");
    }


    function it_should_work_for_numbers_20_to_29()
    {
        $this->parse(21)->shouldReturn("njezet e nje");
        $this->parse(20)->shouldReturn("njezet");
    }

    function it_should_work_for_numbers_30_to_99()
    {
        $this->parse(31)->shouldReturn("tredhjete e nje");
        $this->parse(49)->shouldReturn("katerdhjete e nente");
        $this->parse(80)->shouldReturn("tetedhjete");
    }

    function it_should_work_for_numbers_100_to_999()
    {
        $this->parse(100)->shouldReturn("njeqind");
        $this->parse(109)->shouldReturn("njeqind e nente");
        $this->parse(112)->shouldReturn("njeqind e dymbedhjete");
        $this->parse(121)->shouldReturn("njeqind e njezet e nje");
        $this->parse(130)->shouldReturn("njeqind e tredhjete");
        $this->parse(156)->shouldReturn("njeqind e pesedhjete e gjashte");
        $this->parse(752)->shouldReturn("shtateqind e pesedhjete e dy");
        $this->parse(700)->shouldReturn("shtateqind");
        $this->parse(702)->shouldReturn("shtateqind e dy");
    }

    function it_should_work_for_numbers_1000_to_9999()
    {
        $this->parse(1000)->shouldReturn("njemije");
        $this->parse(1003)->shouldReturn("njemije e tre");
        $this->parse(1109)->shouldReturn("njemije e njeqind e nente");
        $this->parse(1112)->shouldReturn("njemije e njeqind e dymbedhjete");
        $this->parse(1121)->shouldReturn("njemije e njeqind e njezet e nje");
        $this->parse(1130)->shouldReturn("njemije e njeqind e tredhjete");
        $this->parse(1156)->shouldReturn("njemije e njeqind e pesedhjete e gjashte");
    }

    function it_should_work_for_numbers_10000_to_99999()
    {
        $this->parse(10000)->shouldReturn("dhjetemije");
        $this->parse(11000)->shouldReturn("njembedhjetemije");
        $this->parse(10005)->shouldReturn("dhjetemije e pese");
        $this->parse(10010)->shouldReturn("dhjetemije e dhjete");
        $this->parse(10013)->shouldReturn("dhjetemije e trembedhjete");
        $this->parse(10023)->shouldReturn("dhjetemije e njezet e tre");
        $this->parse(10100)->shouldReturn("dhjetemije e njeqind");
        $this->parse(22100)->shouldReturn("njezet e dymije e njeqind");
        $this->parse(31100)->shouldReturn("tredhjete e njemije e njeqind");
        $this->parse(98512)->shouldReturn("nentedhjete e tetemije e peseqind e dymbedhjete");
    }

    function it_should_work_for_numbers_100000_to_999999()
    {
        $this->parse(100000)->shouldReturn("njeqindmije");
        $this->parse(100001)->shouldReturn("njeqindmije e nje");
        $this->parse(100012)->shouldReturn("njeqindmije e dymbedhjete");
    }
}
