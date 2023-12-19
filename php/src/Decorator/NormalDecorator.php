<?php

declare(strict_types=1);

namespace GildedRose\Decorator;

class NormalDecorator extends QualityDecorator
{
    public function update(): void
    {
        $this->decrease();
        $this->item->sellIn--;
        if ($this->item->sellIn < 0) {
            $this->decrease();
        }
    }
}
