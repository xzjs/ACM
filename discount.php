<?php

class Discount
{
    public $money;
    public $time;

    function __construct($money, $time)
    {
        $this->money = $money;
        $this->time = $time;
    }
}

$discounts = [];
for ($i = 0; $i < 10; $i++) {
    $discount = new Discount(rand(1, 10), time() - rand(1111, 9999));
    array_push($discounts, $discount);
}
print_r($discounts);

function quick_sort($ds)
{
    if (count($ds) <= 1) {
        return $ds;
    } else {
        $left = [];
        $right = [];
        for ($i = 1; $i < count($ds); $i++) {
            if ($ds[$i]->money > $ds[0]->money) {
                array_push($left, $ds[$i]);
            } else if ($ds[$i]->money < $ds[0]->money) {
                array_push($right, $ds[$i]);
            } else {
                if ($ds[$i]->time <= $ds[0]->time) {
                    array_push($left, $ds[$i]);
                } else {
                    array_push($right, $ds[$i]);
                }
            }
        }
        $left = quick_sort($left);
        $right = quick_sort($right);
        return array_merge($left, [$ds[0]], $right);
    }
}

$result = quick_sort($discounts);
print_r($result);
