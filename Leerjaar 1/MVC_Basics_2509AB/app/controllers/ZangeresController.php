<?php
class ZangeresController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->zangeresModel->getAllZangeres();


        $data = [
            'title' => 'Rijkste Zangeressen',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('Zangeres/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->zangeresModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/zangeresController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe Zangeres toevoegen',
            'display' => 'none',
            'message' => '',
            'errors' => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty(trim($_POST['stagenaam']))) {
                $errors['stagenaam'] = 'Voer een Stagenaam in';
            } elseif (strlen($_POST['stagenaam']) > 20) {
                $errors['stagenaam'] = 'Merk mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 20) {
                $errors['naam'] = 'naam mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['tussenvoegsel']))) {
                $errors['tussenvoegsel'] = 'Voer een tussenvoegsel in';
            } elseif (strlen($_POST['tussenvoegsel']) > 20) {
                $errors['tussenvoegsel'] = 'tussenvoegsel mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['achternaam']))) {
                $errors['achternaam'] = 'Voer een achternaam in';
            } elseif (strlen($_POST['achternaam']) > 20) {
                $errors['achternaam'] = 'achternaam mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['land']))) {
                $errors['land'] = 'Voer een land in';
            } elseif (strlen($_POST['land']) > 20) {
                $errors['land'] = 'land mag maximaal 20 tekens bevatten';
            }

            if (empty($_POST['networth'])) {
                $errors['networth'] = 'Voer een networth in';
            } elseif (!is_numeric($_POST['networth']) || $_POST['networth'] < -999999999999 || $_POST['networth'] > 999999999999) {
                $errors['networth'] = 'Voer een geldige networth in (-999999999999 - 999999999999)';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->zangeresModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/ZangeresController/index');
            }
        }
        $this->view('Zangeres/create', $data);
    }

    public function update($id = NULL)
    {
        $data = [
            'title' => 'Wijzig Zangeres',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty(trim($_POST['stagenaam']))) {
                $errors['stagenaam'] = 'Voer een stagenaam in';
            } elseif (strlen($_POST['stagenaam']) > 20) {
                $errors['stagenaam'] = 'Stagenaam mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 20) {
                $errors['naam'] = 'Naam mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['achternaam']))) {
                $errors['achternaam'] = 'Voer een achternaam in';
            } elseif (strlen($_POST['achternaam']) > 20) {
                $errors['achternaam'] = 'Achternaam mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['land']))) {
                $errors['land'] = 'Voer een land in';
            } elseif (strlen($_POST['land']) > 20) {
                $errors['land'] = 'Land mag maximaal 20 tekens bevatten';
            }

            if (empty($_POST['networth'])) {
                $errors['networth'] = 'Voer een networth in';
            } elseif (!is_numeric($_POST['networth']) || $_POST['networth'] < -999999999999 || $_POST['networth'] > 999999999999) {
                $errors['networth'] = 'Voer een geldige networth in (-999999999999 - 999999999999)';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {


                $result = $this->zangeresModel->updateZangeres($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header('Refresh:3 ; url=' . URLROOT . '/zangeresController/index');

            }
        }

        $data['zangeres'] = $this->zangeresModel->getZangeresById($id);

        $this->view('Zangeres/update', $data);
    }


}
?>