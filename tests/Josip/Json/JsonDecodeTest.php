<?php

namespace Josip\Json;

class JsonDecodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canSuccessfullyDecodeJsonStringToArray()
    {
        $expected = array(
            'hello' => 'there'
        );

        $sampleJson = '{"hello":"there"}';

        /** @noinspection PhpUnhandledExceptionInspection */
        $actual = \Josip\Json\json_decode($sampleJson, true);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function throwsExceptionOnFailure()
    {
        $this->expectException('\Josip\Json\Exceptions\JsonDecodeException');
        $this->expectExceptionMessage('Malformed UTF-8 characters, possibly incorrectly encoded');
        $this->expectExceptionCode(JSON_ERROR_UTF8);

        /** @noinspection PhpUnhandledExceptionInspection */
        \Josip\Json\json_decode("\xB1\x31");
    }
}
