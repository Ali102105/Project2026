<?php
class HorlogeController extends BaseController
{
        private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index($display='none', $message='')
    {
    $result = $this->horlogeModel->getAllHorloges();
    

        $data = [
            'title' => 'Duurste Horloges',
            'display' => $display,
            'message' => $message,
            'result' => $result 
        ];

        $this->view('Horloge/index', $data);
    }

            public function delete($Id)
    {
        $result = $this->horlogeModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/horlogeController/index');

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
               empty($_POST['prijs'])) {

               $data['display'] = 'flex';
               $data['message'] = 'De gegevens zijn opgeslagen';
               }
            else {
               $data['display'] = 'flex';
               $data['message'] = 'De gegevens zijn opgeslagen';

               $this->horlogeModel->create($_POST);

    header('Refresh: 3; URL=' . URLROOT . '/HorlogeController/index');
}
        }
        $this->view('Horloge/create', $data);
    }

}
?>