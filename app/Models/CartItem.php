<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "cart_items";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = ['cantidad', 'product_id', 'cart_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function product(){
        return $this ->belongsTo(Product::class);
    }
}

