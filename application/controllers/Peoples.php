<?php
class Peoples extends CI_Controller
{

    //construct untuk manggil satu method di semua function dalam 1 kelas
    //kalo banyak kelas ditaruhnya di config/autoload

    public function index()
    // = '' nilai default = kosong jika tidak ada parameter nama dalam link
    //index bisa diisi parameter
    //nanti jatuhnya /index/$nama di link nya
    //$nama yg di index.php ambil value dari link
    {
        $data['judul'] = 'List of Peoples';

        //codingan dibawah parameter pertama adalah nama modelnya
        //parameter kedua adalah alias, sehingga ketika akan memanggil model
        //yg digunakan aliasnya saja
        $this->load->model('peoplesModel', 'peoplesM');
        $data['peoples'] = $this->peoplesM->tampilData();

        $this->load->view('templates/header', $data);
        $this->load->view('peoples/index', $data);
        $this->load->view('templates/footer');
    }
}
