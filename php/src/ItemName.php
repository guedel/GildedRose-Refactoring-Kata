<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Decorator\AgedBrieDecorator;
use GildedRose\Decorator\BackstagePassDecorator;
use GildedRose\Decorator\ConjuredDecorator;
use GildedRose\Decorator\EternalDecorator;
use GildedRose\Decorator\NormalDecorator;
use GildedRose\Decorator\QualityDecorator;

enum ItemName: string
{
    case AgedBrie = 'Aged Brie';
    case BackstageToConcert = 'Backstage passes to a TAFKAL80ETC concert';
    case Sulfuras = 'Sulfuras, Hand of Ragnaros';
    case Conjured = 'Conjured Mana Cake';
    case Other = 'Other';

    public static function getType(Item $item): self
    {
        return self::tryFrom($item->name) ?? self::Other;
    }

    public static function getDecorator(Item $item): QualityDecorator
    {
        return match (static::getType($item)) {
             static::AgedBrie => new AgedBrieDecorator($item),
             static::BackstageToConcert => new BackstagePassDecorator($item),
             static::Sulfuras => new EternalDecorator($item),
             static::Conjured => new ConjuredDecorator($item),
             default => new NormalDecorator($item)
        };
    }
}

