<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('landing_m');
    }

    public function index()

    {
        $data['row'] = $this->landing_m->getPaket();
        $this->load->view('frontend/index', $data);
    }



}