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
            'message'  => '',
            'errors'   => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty(trim($_POST['merk']))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 20) {
                $errors['merk'] = 'Merk mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['model']))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 20) {
                $errors['model'] = 'Model mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 20) {
                $errors['type'] = 'Type mag maximaal 20 tekens bevatten';
            }

            if (empty($_POST['prijs'])) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999.99) {
                $errors['prijs'] = 'Voer een geldige prijs in (0 - 9999,99)';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer het materiaal van de sneaker in';
            } elseif (strlen($_POST['materiaal']) > 20) {
                $errors['materiaal'] = 'Maximaal 20 tekens';
            }

            if (empty(trim($_POST['gewicht']))) {
                $errors['gewicht'] = 'Voer het gewicht van de sneaker in';
            } elseif (strlen($_POST['gewicht']) > 20) {
                $errors['gewicht'] = 'Maximaal 20 tekens';
            }

            if (empty($_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
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

