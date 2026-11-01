<?php

namespace App\Http\Controllers;

use App\Models\LeverancierModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LeverancierController extends Controller
{
    private LeverancierModel $leverancierModel;

    public function __construct(
        LeverancierModel $leverancierModel
    ) {
        $this->leverancierModel = $leverancierModel;
    }

    /**
     * Userstory 1: Leveranciersoverzicht.
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
     * Userstory 1: Geleverde producten.
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

    /**
     * Userstory 2: Leveringsformulier tonen.
     */
    public function leveringFormulier(
        int $leverancierId,
        int $productId
    ): View {
        $product = $this->leverancierModel
            ->getLeveringProduct(
                $leverancierId,
                $productId
            );

        abort_if($product === null, 404);

        return view('leveranciers.levering', [
            'product' => $product
        ]);
    }

    /**
     * Userstory 2: Nieuwe levering opslaan.
     */
    public function leveringOpslaan(
        Request $request,
        int $leverancierId,
        int $productId
    ): RedirectResponse|View {

        $gegevens = $request->validate([
            'aantal' => [
                'required',
                'integer',
                'min:1',
                'max:65535'
            ],
            'datum_eerst_volgende_levering' => [
                'required',
                'date_format:Y-m-d'
            ]
        ]);

        $product = $this->leverancierModel
            ->getLeveringProduct(
                $leverancierId,
                $productId
            );

        abort_if($product === null, 404);

        $resultaat = $this->leverancierModel
            ->voegLeveringToe(
                $leverancierId,
                $productId,
                (int) $gegevens['aantal'],
                $gegevens['datum_eerst_volgende_levering']
            );

        /**
         * Unhappy flow:
         * Product wordt niet meer geproduceerd.
         */
        if ($resultaat === 'inactief') {
            return view('leveranciers.levering', [
                'product' => $product,
                'nietMeerGeproduceerd' => true
            ]);
        }

        abort_if($resultaat !== 'gelukt', 404);

        /**
         * Happy flow:
         * Terug naar geleverde producten.
         */
        return redirect()
            ->route('leveranciers.producten', $leverancierId)
            ->with(
                'succes',
                'De nieuwe levering is opgeslagen en de voorraad is verhoogd.'
            );
    }
}
