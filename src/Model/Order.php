<?php


namespace App\Model;


class Order extends Model
{

    public string $table = 'orders';
    public $purchase_date;
    public $country;
    public $device;
    public $user_id;

    public function attributes(): array{
        return ['purchase_date', 'country', 'device', 'user_id'];
    }

}