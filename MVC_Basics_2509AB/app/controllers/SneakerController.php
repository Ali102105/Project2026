<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }
    public function index($display='none', $message='')
    {
        $result = $this->sneakerModel->getAllSneakers();


        $data = [
            'title' => 'Mooiste Sneakers',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];
        $this->view('Sneaker/index', $data);
    }
        public function delete($Id)
    {
        $result = $this->sneakerModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/sneakerController/index');

        $this->index('flex',  'Record is verwijderd');
    }

        public function create()
    {
        $data = [
            'title'    => 'Nieuwe sneaker toevoegen',
            'display'  => 'none',
            'message'  => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
               empty($_POST['model'])||
               empty($_POST['type'])||
               empty($_POST['prijs'])||
               empty($_POST['materiaal'])||
               empty($_POST['gewicht'])||
               empty($_POST['releasedatum'])) {

               $data['display'] = 'flex';
               $data['message'] = 'De gegevens zijn opgeslagen';
               }
            else {
               $data['display'] = 'flex';
               $data['message'] = 'De gegevens zijn opgeslagen';

               $this->sneakerModel->create($_POST);

    header('Refresh: 3; URL=' . URLROOT . '/SneakerController/index');
}
        }
        $this->view('Sneaker/create', $data);
    }

        public function update($id = NULL)
    {
        $data = [
            'title' => 'Wijzig Sneaker',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['type']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul Alle velden in';
                $data['color']   = 'danger';
                }
                else {
                    $result = $this->sneakerModel->updateSneaker($_POST);

                    $data['display'] = 'flex';
                    $data['message'] = 'Het record is succesvol opgeslagen';
                    $data['color']   = 'success';
                    header("Refresh:3 url='/sneakerController/index'");
          }
        }

        $data['Sneaker'] = $this->sneakerModel->getSneakerById($id);

        $this->view('Sneaker/update', $data);
    }
}

