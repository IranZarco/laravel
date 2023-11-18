<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "cart";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = ['total', 'user_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function user(){
        return $this -> HasMany(User::class);
    }
    public function cartitem(){
        return $this -> HasMany(CartItem::class);
    }
}
