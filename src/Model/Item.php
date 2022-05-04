<?php


namespace App\Model;

class Item extends Model
{
    public string $table = 'items';
    public $id;
    public $ean;
    public $qty;
    public $price;
    public $order_id;


    public function attributes(): array{
        return  ['ean', 'qty', 'price', 'order_id'];
    }
}