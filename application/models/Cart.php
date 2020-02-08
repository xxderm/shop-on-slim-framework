<?php
namespace App\Models;
use \Illuminate\Database\Eloquent\Model;
class Cart extends Model
{
    protected $table = 'cart';
    public $timestamps = false;
    protected $fillable =
        [
            'Product_id',
            'User_id'
        ];
}