<?php

class Home extends CI_Controller
{
	// konstruktor
    public function __construct()
    {
        parent:: __construct();
        // menghubungkan ke model home
        $this->load->model('model_home');
    }

    // pengaksesan controller home
    public function index()
    { 
        // menghubungkan ke view home
        $this->load->view('view_home');
    }

}