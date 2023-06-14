<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    // funcion para buscar un articulo
    public static function showArticles()
    {
        $sql = 'CALL sp_ver_articulos()';
        
        $result = DB::select($sql); 

        return $result;
    }

    // funcion para crear un articulo
    public static function addArticle($sku, $article, $brand, $model, $family_id, $date_high, $stock, $quantity, $disconinued, $date_low)
    {
        $sql = 'CALL sp_insertar_articulo(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $result = DB::statement($sql, [
            $sku,
            $article,
            $brand,
            $model,
            $family_id,
            $date_high,
            $stock,
            $quantity,
            $disconinued,
            $date_low,
        ]);

        return $result;
    }

    // funcion para buscar un articulo
    public static function showArticle($sku)
    {
        $sql = 'CALL sp_ver_articulo(?)';
        
        $result = DB::select($sql, [$sku]); 

        return $result;
    }

    // funcion para eliminar
    public static function deleteArticle($sku)
    {
        $sql = "CALL sp_eliminar_articulo(?)";

        DB::statement($sql, [$sku]);
    }

    // funcion para editar
    public static function updateArticle($sku, $article, $brand, $model, $family_id, $date_high, $stock, $quantity, $disconinued, $date_low)
    {
        $sql = "CALL sp_cambio_articulo(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $result = DB::statement($sql, [$sku, $article, $brand, $model, $family_id, $date_high, $stock, $quantity, $disconinued, $date_low]);

        return $result;
    }
}
