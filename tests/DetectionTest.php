<?php

use PHPUnit\Framework\TestCase;

class DetectionTest extends TestCase
{
    public function testShouldBeThreeOfAKind()
    {
        $excepted = 'Three of a kind';
        $cards = [
            [
                'number' => '3',
                'suits' => 'Diamonds',
            ],
            [
                'number' => '3',
                'suits' => 'Spades',
            ],
            [
                'number' => '3',
                'suits' => 'Hearts',
            ],
            [
                'number' => '5',
                'suits' => 'Clubs',
            ],
            [
                'number' => '9',
                'suits' => 'Diamonds',
            ],
        ];
        $cards2 = [
            [
                'number' => 'A',
                'suits' => 'Diamonds',
            ],
            [
                'number' => '3',
                'suits' => 'Spades',
            ],
            [
                'number' => '3',
                'suits' => 'Hearts',
            ],
            [
                'number' => '5',
                'suits' => 'Clubs',
            ],
            [
                'number' => '3',
                'suits' => 'Diamonds',
            ],
        ];
        $cards3 = [
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
                'number' => '3',
                'suits' => 'Clubs',
            ],
            [
                'number' => '3',
                'suits' => 'Diamonds',
            ],
        ];
        $cards4 = [
            [
                'number' => 'A',
                'suits' => 'Diamonds',
            ],
            [
                'number' => '5',
                'suits' => 'Spades',
            ],
            [
                'number' => '3',
                'suits' => 'Hearts',
            ],
            [
                'number' => '3',
                'suits' => 'Clubs',
            ],
            [
                'number' => '3',
                'suits' => 'Diamonds',
            ],
        ];
        $detection = new \PokerDetection\Detection($cards);
        $this->assertEquals($excepted, $detection->detect());
        $detection->setCards($cards2);
        $this->assertEquals($excepted, $detection->detect());
        $detection->setCards($cards3);
        $this->assertEquals($excepted, $detection->detect());
        $detection->setCards($cards4);
        $this->assertEquals($excepted, $detection->detect());
    }
    public function testShouldBeTwoPair()
    {
        $expected = 'TwoPair';
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
                'number' => '5',
                'suits' => 'Clubs',
            ],
            [
                'number' => '9',
                'suits' => 'Diamonds',
            ],
        ];
        $detection = new \PokerDetection\Detection($cards);
        $result = $detection->detect();

        $this->assertEquals($expected, $result);
    }
    public function testShouldBeHighCard()
    {
        $expected = 'HighCard';
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
        $detection = new \PokerDetection\Detection($cards);
        $result = $detection->detect();

        $this->assertEquals($expected, $result);
    }

    public function testShouldBeOnePair()
    {
        $expected = 'OnePair';

        $cards1 = [
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
        $cards2 = [
            [
                'number' => 'A',
                'suits' => 'Diamonds',
            ],
            [
                'number' => '5',
                'suits' => 'Spades',
            ],
            [
                'number' => 'A',
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
        $cards3 = [
            [
                'number' => 'A',
                'suits' => 'Diamonds',
            ],
            [
                'number' => '5',
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
        $cards4 = [
            [
                'number' => 'A',
                'suits' => 'Diamonds',
            ],
            [
                'number' => '5',
                'suits' => 'Spades',
            ],
            [
                'number' => '7',
                'suits' => 'Hearts',
            ],
            [
                'number' => '6',
                'suits' => 'Clubs',
            ],
            [
                'number' => '7',
                'suits' => 'Diamonds',
            ],
        ];
        $detection = new \PokerDetection\Detection($cards1);
        $this->assertEquals($expected, $detection->detect());
        $detection->setCards($cards2);
        $this->assertEquals($expected, $detection->detect());
        $detection->setCards($cards3);
        $this->assertEquals($expected, $detection->detect());
        $detection->setCards($cards4);
        $this->assertEquals($expected, $detection->detect());
    }
}