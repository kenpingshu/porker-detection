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

    public function detect(array $cards)
    {
        foreach ($cards as $idx => $card) {
            foreach ($cards as $idx2 => $check_card)  {
                if ($idx === $idx2)
                    continue;
                if ($card['number'] === $check_card['number'])
                    return 'OnePair';
            }
        }
        return 'HighCard';
    }
}