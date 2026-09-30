<?php

namespace App\Http\Controllers;

use App\Models\MagazijnModel;
use Illuminate\Http\Request;

class MagazijnController extends Controller
{
    private $MagazijnModel;

    public function __construct()
    {
        $this->MagazijnModel = new MagazijnModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magazijnen = $this->MagazijnModel->SP_GetAllMagazijn();

        return view('magazijn.index', [
            'title' => 'Magazijn',
            'magazijnen' => $magazijnen
        ]);
    }

    public function allergenen($productId)
    {
        $allergenen = $this->MagazijnModel
            ->SP_GetAllergenenByProductId($productId);

        return view('magazijn.allergenen', [
            'title' => 'Allergenen Overzicht',
            'allergenen' => $allergenen
        ]);
    }


    public function leverantie($productId)
    {
        $leveringen = $this->MagazijnModel
            ->SP_GetLeverantieByProductId($productId);

        return view('magazijn.leverantie', [
            'title' => 'Leveringsinformatie',
            'leveringen' => $leveringen
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MagazijnModel $magazijnModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MagazijnModel $magazijnModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MagazijnModel $magazijnModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MagazijnModel $magazijnModel)
    {
        //
    }


}
