<?php

use PHPUnit\Framework\TestCase;

class DetectionTest extends TestCase
{
    public function testShouldBeHighCard()
    {
        $expected = 'HighCard';
        $detection = new \PokerDetection\Detection();
        $cards = [
            [
                'number' => 'A',
                'suits' => 'Diamonds',
            ],
            [
                'number' => '3',
                'suits' => 'Spades',
            ],
            [
                'number' => '5',
                'suits' => 'Hearts',
            ],
            [
                'number' => '7',
                'suits' => 'Clubs',
            ],
            [
                'number' => '9',
                'suits' => 'Diamonds',
            ],
        ];
        $result = $detection->detect($cards);

        $this->assertEquals($expected, $result);
    }

    public function testShouldBeOnePair()
    {
        $expected = 'OnePair';
        $detection = new \PokerDetection\Detection();
        $cards = [
            [
                'number' => 'A',
                'suits' => 'Diamonds',
            ],
            [
                'number' => 'A',
                'suits' => 'Spades',
            ],
            [
                'number' => '5',
                'suits' => 'Hearts',
            ],
            [
                'number' => '7',
                'suits' => 'Clubs',
            ],
            [
                'number' => '9',
                'suits' => 'Diamonds',
            ],
        ];
        $result = $detection->detect($cards);

        $this->assertEquals($expected, $result);
    }
}