<?php
namespace App\Models;
use \Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $fillable =
        [
            'User_id',
            'Product_id'
        ];
}