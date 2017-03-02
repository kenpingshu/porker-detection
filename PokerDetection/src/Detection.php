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
    private $handType = [];

    public function setHandType(PorkerHandInterface $type)
    {
        $this->handType[] = $type;
    }
    public function __construct(array $cards)
    {
        $this->cards = $cards;
    }

    public function detect()
    {
        $final = 'HighCard';
        foreach ($this->handType as $type)  {
            if ($type->isMatch()) {
                return $type->getHandType;
            }
        }
//        if ($this->isThreeOfAKind($this->cards)) {
//            return 'Three of a kind';
//        }
//        if ($this->isTwoPair($this->cards)) {
//            return 'TwoPair';
//        }
//        if ($this->isOnePair($this->cards)) {
//            return 'OnePair';
//        }
        return $final;
    }

    private function isOnePair($cards)
    {
        foreach ($cards as $idx => $card) {
            foreach ($cards as $idx2 => $check_card) {
                if ($idx === $idx2)
                    continue;
                if ($card['number'] === $check_card['number'])
                    return [$card, $check_card];
            }
        }
        return false;
    }

    public function setCards($cards)
    {
        $this->cards = $cards;
    }

    private function isTwoPair($cards)
    {
        if ($one_pair_cards = $this->isOnePair($cards)) {
            $left_cards = $this->removeCards($cards, $one_pair_cards);
            if ($this->isOnePair($left_cards)) {
                return true;
            }
        }
        return false;
    }

    private function removeCards($cards, $remove_cards)
    {
        foreach ($remove_cards as $card) {
            if (($key = array_search($card, $cards)) !== false) {
                unset($cards[$key]);
            }
        }
        return $cards;
    }

    private function isThreeOfAKind($cards)
    {

        foreach ($cards as $idx => $card) {
            $meet_cards = [$card];
            foreach ($cards as $idx2 => $check_card) {
                if ($idx === $idx2)
                    continue;
                if ($card['number'] === $check_card['number']) {
                    array_push($meet_cards, $check_card);
                    if (count($meet_cards) == 3)
                        return $meet_cards;
                }
            }
        }
        return false;
    }

}