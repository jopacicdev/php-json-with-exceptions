<?php

namespace Josip\Json;

class JsonEncodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canSuccessfullyEncodeArrayToJson()
    {
        $sampleArray = array(
            'hello' => 'there'
        );

        $expected = '{"hello":"there"}';

        /** @noinspection PhpUnhandledExceptionInspection */
        $result = \Josip\Json\json_encode($sampleArray);

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function canSuccessfullyEncodeStdObjToJson()
    {
        $sampleObj = new \stdClass();
        $sampleObj->hello = 'there';

        $expected = '{"hello":"there"}';

        /** @noinspection PhpUnhandledExceptionInspection */
        $result = \Josip\Json\json_encode($sampleObj);

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function throwsExceptionOnFailure()
    {
        $this->expectException('\Josip\Json\Exceptions\JsonEncodeException');
        $this->expectExceptionMessage('Malformed UTF-8 characters, possibly incorrectly encoded');
        $this->expectExceptionCode(JSON_ERROR_UTF8);

        /** @noinspection PhpUnhandledExceptionInspection */
        \Josip\Json\json_encode("\xB1\x31");
    }
}
