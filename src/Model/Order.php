<?php


namespace App\Model;


/**
 * Class Order
 * @package App\Model
 */
class Order extends Model
{

    /**
     * @var string
     */
    public string $table = 'orders';
    /**
     * @var
     */
    public $purchase_date;
    /**
     * @var
     */
    public $country;
    /**
     * @var
     */
    public $device;
    /**
     * @var
     */
    public $user_id;

    /**
     * @return string[]
     */
    public function attributes(): array{
        return ['purchase_date', 'country', 'device', 'user_id'];
    }

}