<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class LeverancierModel extends Model
{
    /**
     * Stored Procedure uitvoeren met PDO.
     */
    private function callProcedure(
        string $procedure,
        array $parameters = []
    ): array {
        $placeholders = implode(
            ', ',
            array_fill(0, count($parameters), '?')
        );

        $pdo = DB::connection()->getPdo();

        $statement = $pdo->prepare(
            "CALL {$procedure}({$placeholders})"
        );

        foreach ($parameters as $index => $value) {
            $statement->bindValue(
                $index + 1,
                $value,
                is_int($value)
                    ? PDO::PARAM_INT
                    : PDO::PARAM_STR
            );
        }

        $statement->execute();

        try {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } finally {
            $statement->closeCursor();
        }
    }

    /**
     * Alle leveranciers ophalen.
     */
    public function getLeveranciers(): array
    {
        return $this->callProcedure(
            'SP_GetAllLeveranciers'
        );
    }

    /**
     * Eén leverancier ophalen.
     */
    public function getLeverancier(
        int $leverancierId
    ): ?object {
        $resultaat = $this->callProcedure(
            'SP_GetLeverancierById',
            [$leverancierId]
        );

        return $resultaat[0] ?? null;
    }

    /**
     * Producten van een leverancier ophalen.
     */
    public function getProducten(
        int $leverancierId
    ): array {
        return $this->callProcedure(
            'SP_GetProductenByLeverancierId',
            [$leverancierId]
        );
    }
}
