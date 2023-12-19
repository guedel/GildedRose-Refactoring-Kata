<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Decorator\AgedBrieDecorator;
use GildedRose\Decorator\QualityDecorator;
use GildedRose\Decorator\BackstagePassDecorator;
use GildedRose\Decorator\EternalDecorator;
use GildedRose\Decorator\NormalDecorator;

enum ItemName: string
{
    case AgedBrie = 'Aged Brie';
    case BackstageToConcert = 'Backstage passes to a TAFKAL80ETC concert';
    case Sulfuras = 'Sulfuras, Hand of Ragnaros';
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
             default => new NormalDecorator($item)
        };
    }
}

