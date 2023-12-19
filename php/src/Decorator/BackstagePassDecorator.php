<?php

declare(strict_types=1);

namespace GildedRose\Decorator;

class BackstagePassDecorator extends QualityDecorator
{
    public function update(): void
    {
        $this->increase();
        if ($this->item->sellIn < 11) {
            $this->increase();
        }
        if ($this->item->sellIn < 6) {
            $this->increase();
        }
        $this->item->sellIn--;
        if ($this->item->sellIn < 0) {
            $this->item->quality = 0;
        }
    }
}
