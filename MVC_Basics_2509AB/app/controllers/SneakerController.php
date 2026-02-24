<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }
    public function index()
    {
        $result = $this->sneakerModel->getAllSneakers();


        $data = [
            'title' => 'Mooiste Sneakers',
            'result' => $result
        ];
        $this->view('Sneaker/index', $data);
    }
}
