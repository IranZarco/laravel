<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    #especifica el nombre de la tabla dentro de base de datos
    protected $table = "product";

    #columnas existentes dentro de tu tabla
    protected $fillable = ['nombre','descripcion','precio','stock'];
    #esconde columnas especificas
    protected $hidden =['created_at','updated_at'];
}