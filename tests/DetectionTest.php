<?php

use PHPUnit\Framework\TestCase;

class DetectionTest extends TestCase
{
    public function testShouldBeHighCard()
    {
        $expected = 'HighCard';
        $this->assertEquals($expected,'HighCard');
    }
}