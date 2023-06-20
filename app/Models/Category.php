<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function families()
    {
        return $this->hasMany(Family::class);
    }

    // funcion para buscar un articulo
    public static function showCategory($id)
    {
        $sql = 'CALL sp_ver_categoria(?)';
        
        $result = DB::select($sql, [$id]);

        return $result;
    }

    // funcion para buscar un articulo
    public static function showCategories($department_id)
    {
        $sql = 'CALL sp_ver_categorias(?)';
        
        $result = DB::select($sql,[$department_id]); 

        return $result;
    }
}
