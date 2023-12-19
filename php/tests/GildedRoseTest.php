<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }

    public function testDecrease(): void
    {
        $items = [new Item('foo', 10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(9, $items[0]->quality);
        $this->assertEquals(9, $items[0]->sellIn);
    }

    public function testMaxDecrease(): void
    {
        $items = [new Item('foo', 50, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(9, $items[0]->quality);
        $this->assertEquals(49, $items[0]->sellIn);
    }

    public function testConjured(): void
    {
        $items = [
            new Item('Conjured Mana Cake', 50, 50),
            new Item('Conjured Mana Cake', 0, 0),
        ];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(49, $items[0]->sellIn);
        $this->assertEquals(48, $items[0]->quality);
        $this->assertEquals(-1, $items[1]->sellIn);
        $this->assertEquals(0, $items[1]->quality);
    }
}
