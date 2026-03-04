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
}


