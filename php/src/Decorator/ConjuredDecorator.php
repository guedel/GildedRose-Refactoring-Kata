<?php

declare(strict_types=1);

namespace GildedRose\Decorator;

class ConjuredDecorator extends QualityDecorator
{
    public function update(): void
    {
        $this->decrease();
        $this->item->sellIn--;
        $this->decrease();
    }
}