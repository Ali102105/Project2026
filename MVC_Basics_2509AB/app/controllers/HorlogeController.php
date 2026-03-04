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
}


?>