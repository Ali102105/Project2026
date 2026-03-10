<?php

class SmartphoneController extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('Smartphone');
    }
    public function index($display='none', $message='')
    {
        $result = $this->smartphoneModel->getAllSmartphones();

        $data = [
            'title' => 'Overzicht Smartphones',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('smartphone/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->smartphoneModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/smartphoneController/index');

        $this->index('flex', 'Record is verwijderd');
    }

            public function create()
            {
              $data = [
                        'title'   => 'Nieuwe smartphone toevoegen',
                        'display' => 'none',
                        'message' => ''
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (
            empty($_POST['merk']) ||
            empty($_POST['model']) ||
            empty($_POST['prijs']) ||
            empty($_POST['geheugen']) ||
            empty($_POST['besturingssysteem']) ||
            empty($_POST['schermgrootte']) ||
            empty($_POST['releasedatum']) ||
            empty($_POST['megapixels'])
        ) {
            $data['display'] = 'flex';
            $data['message'] = 'Vul alle velden in';
        } else {
            $data['display'] = 'flex';
            $data['message'] = 'De gegevens zijn opgeslagen';

            $this->smartphoneModel->create($_POST);

            header('Refresh: 3; URL=' . URLROOT . '/SmartphoneController/index');
        }
    }

    $this->view('smartphone/create', $data);
}
        }
