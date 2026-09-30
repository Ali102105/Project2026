<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MagazijnModel extends Model
{
    public function SP_GetAllMagazijn()
    {
        return DB::select('CALL SP_GetAllMagazijn');
    }

    public function SP_GetAllergenenByProductId($productId)
    {
        return DB::select(
            'CALL SP_GetAllergenenByProductId(?)',
            [$productId]
        );
    }

    public function SP_GetLeverantieByProductId($productId)
    {
        return DB::select(
            'CALL SP_GetLeverantieByProductId(?)',
            [$productId]
        );
    }
}