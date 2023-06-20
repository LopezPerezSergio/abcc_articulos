<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Family extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // funcion para buscar un articulo
    public static function showFamiliy($id)
    {
        $sql = 'CALL sp_ver_familia(?)';
        
        $result = DB::select($sql, [$id]);

        return $result;
    }

    // funcion para buscar un articulo
    public static function showFamilies($category_id)
    {
        $sql = 'CALL sp_ver_familias(?)';
        
        $result = DB::select($sql,[$category_id]); 

        return $result;
    }
}
