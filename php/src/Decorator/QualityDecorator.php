<?php

declare(strict_types=1);

namespace GildedRose\Decorator;

use GildedRose\Item;

abstract class QualityDecorator
{
    public function __construct(
        protected Item $item
    ) {
    }

    abstract public function update(): void;

    protected function decrease(): void
    {
        if ($this->item->quality > 0) {
            $this->item->quality--;
        }
    }

    protected function increase(): void
    {
        if ($this->item->quality < 50) {
            $this->item->quality++;
        }
    }
}
