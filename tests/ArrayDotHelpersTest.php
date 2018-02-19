<?php


class ArrayDotHelpersTest extends PHPUnit_Framework_TestCase {

    public function testFlattenArray()
    {
        $current = [
            'hi' => [
                'hello' => [
                    'morning' => 'value'
                ]
            ]
        ];

        $expected = [
            'hi.hello.morning' => 'value'
        ];

        $this->assertEquals($expected, array_dot($current));
    }

    public function testUndotArray()
    {
        $current = [
            'hello.hi'  => 'value2',
            'hello.heg' => 'value3',
            'hah'       => 'value5'
        ];

        $expected = [
            'hello' => [
                'hi'    => 'value2',
                'heg'   => 'value3',
            ],
            'hah'   => 'value5',
        ];

        $this->assertEquals($expected, array_undot($current));
    }

}
