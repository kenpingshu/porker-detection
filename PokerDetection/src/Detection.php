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
        if ($cards[0]['number'] === $cards[1]['number'])
            return 'OnePair';

        return 'HighCard';
    }
}