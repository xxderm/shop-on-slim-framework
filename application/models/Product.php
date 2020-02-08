<?php
namespace App\Models;
use \Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable =
        [
            'Catalog_id',
            'Name',
            'Count',
            'Price',
            'Image',
            'Description',
            'Discount'
        ];
}