<?php
namespace PokerDetection;


class OnePair implements PorkerHandInterface
{
    private $cards;
    private $match_cards = [];
    private $priority;

    public function __construct($cards, $priority)
    {
        $this->cards = $cards;
        $this->priority = $priority;
    }

    public function isMatch():bool
    {
        foreach ($this->cards as $idx => $card) {
            foreach ($this->cards as $idx2 => $check_card) {
                if ($idx === $idx2)
                    continue;
                if ($card['number'] === $check_card['number']){
                    $this->setMatchCards([$card, $check_card]);
                    return true;
                }
            }
        }
        return false;
    }

    public function getHandType():string
    {
        return "OnePair";
    }

    public function getPriority():int
    {
        return $this->priority;
    }

    /**
     * @return mixed
     */
    public function getCards():array
    {
        return $this->cards;
    }

    /**
     * @param mixed $cards
     */
    public function setCards($cards)
    {
        $this->cards = $cards;
    }

    /**
     * @return array
     */
    public function getMatchCards(): array
    {
        return $this->match_cards;
    }

    /**
     * @param array $match_cards
     */
    private function setMatchCards(array $match_cards)
    {
        $this->match_cards = $match_cards;
    }
}