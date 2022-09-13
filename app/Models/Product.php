<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'productName',
        'productPrice',
        'productQuantity',
        'productCode',
        'productDetail',
        'productBrand',
        'productImage',
        'specifications'
    ];

    public function makers()
    {
      return $this->hasOne(Brand::class,'id','productBrand');
    }
}
