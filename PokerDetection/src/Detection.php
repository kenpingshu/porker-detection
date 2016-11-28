<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 11/25/16
 * Time: 6:01 PM
 */

namespace PokerDetection;


class Detection
{
    private $cards;

    public function __construct(array $cards)
    {
        $this->cards = $cards;
    }

    public function detect()
    {
        $final = 'HighCard';
        if ($this->checkOnePair($this->cards)){
            return 'OnePair';
        }
        return $final;
    }

    private function checkOnePair()
    {
        foreach ($this->cards as $idx => $card) {
            foreach ($this->cards as $idx2 => $check_card) {
                if ($idx === $idx2)
                    continue;
                if ($card['number'] === $check_card['number'])
                    return true;
            }
        }
        return false;
    }

    public function setCards($cards)
    {
        $this->cards = $cards;
    }

}