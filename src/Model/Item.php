<?php


namespace App\Model;

/**
 * Class Item
 * @package App\Model
 */
class Item extends Model
{
    /**
     * @var string
     */
    public string $table = 'items';
    /**
     * @var
     */
    public $id;
    /**
     * @var
     */
    public $ean;
    /**
     * @var
     */
    public $qty;
    /**
     * @var
     */
    public $price;
    /**
     * @var
     */
    public $order_id;


    /**
     * @return string[]
     */
    public function attributes(): array{
        return  ['ean', 'qty', 'price', 'order_id'];
    }
}