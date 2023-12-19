<?php

declare(strict_types=1);

namespace GildedRose\Decorator;

class AgedBrieDecorator extends QualityDecorator
{
    public function update(): void
    {
        $this->increase();
        $this->item->sellIn--;
        if ($this->item->sellIn < 0) {
            $this->increase();
        }
    }
}