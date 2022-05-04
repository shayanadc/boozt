<?php

namespace App;
use App\Model\Item;
use App\Model\Order;
use App\Model\User;

class Seeders
{
    public static function run(){
        $user = Fixture::create( User::class,['email' => 'mail@mail.com', 'first_name' => 'shayan', 'last_name' => 'hh']);
        $order1 = Fixture::create(Order::class, ['purchase_date' => '2022-03-03 12:30:10', 'country'=> 'sweden', 'device' => 'mac', 'user_id' => $user->id]);
        $order2 = Fixture::create(Order::class, ['purchase_date' => '2022-04-21 12:30:10', 'country'=> 'sweden', 'device' => 'watch', 'user_id' => $user->id]);
        $item1 = Fixture::create(Item::class, ['qty' => 1, 'price' => 100, 'ean' => 'xyz', 'order_id' => $order1->id]);
        $item2 = Fixture::create(Item::class, ['qty' => 1, 'price' => 200, 'ean' => 'xyz', 'order_id' => $order2->id]);
    }

}