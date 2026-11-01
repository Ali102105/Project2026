<?php

namespace App\Http\Controllers;

use App\Models\LeverancierModel;
use Illuminate\Contracts\View\View;

class LeverancierController extends Controller
{
    private LeverancierModel $leverancierModel;

    public function __construct(
        LeverancierModel $leverancierModel
    ) {
        $this->leverancierModel = $leverancierModel;
    }

    /**
     * Overzicht van alle leveranciers.
     */
    public function index(): View
    {
        $leveranciers = $this->leverancierModel
            ->getLeveranciers();

        return view('leveranciers.index', [
            'leveranciers' => $leveranciers
        ]);
    }

    /**
     * Geleverde producten van een leverancier.
     */
    public function producten(
        int $leverancierId
    ): View {
        $leverancier = $this->leverancierModel
            ->getLeverancier($leverancierId);

        abort_if($leverancier === null, 404);

        $producten = $this->leverancierModel
            ->getProducten($leverancierId);

        return view('leveranciers.producten', [
            'leverancier' => $leverancier,
            'producten' => $producten
        ]);
    }
}
