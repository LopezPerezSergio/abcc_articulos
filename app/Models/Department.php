<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    //Relacion uno a muchos
    public function categories(){
        return $this->hasMany(Category::class);
    }

    // funcion para buscar un articulo
    public static function showDepartment($id)
    {
        $sql = 'CALL sp_ver_departamento(?)';
        
        $result = DB::select($sql, [$id]);

        return $result;
    }
}
