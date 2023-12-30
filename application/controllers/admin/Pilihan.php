<?php
class Pilihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pilihan_model');
        $this->load->database(); 
        $this->load->model('user_model');
		if(!$this->user_model->current_user()){
			redirect('auth/login_admin');
		}
    }

    public function index()
    {
        $data['current_user'] = $this->user_model->current_user();
        $data['pilihan'] = $this->pilihan_model->get_pilihan();
        $this->load->view('admin/hasil_list', $data);
    }

    public function delete($id_pilihan)
    {
        if (empty($id_pilihan)) {
            show_404();
        }

        $this->pilihan_model->hapus_pilihan($id_pilihan);
        redirect('admin/Pilihan');
    }

}
