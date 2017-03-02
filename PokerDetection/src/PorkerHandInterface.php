<?php
namespace PokerDetection;

interface PorkerHandInterface
{
    public function isMatch():bool;
    public function getHandType():string ;
    public function getPriority():int ;
    public function getMatchCards():array ;
}