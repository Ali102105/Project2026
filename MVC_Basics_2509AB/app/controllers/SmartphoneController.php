<?php

class SmartphoneController extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('Smartphone');
    }
    public function index()
    {
        $result = $this->smartphoneModel->getAllSmartphones();


        $data = [
            'title' => 'Overzicht Smartphones',
            'result' => $result
        ];
        $this->view('smartphone/index', $data);
    }
}
