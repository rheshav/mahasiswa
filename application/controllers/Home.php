<?php
class Home extends CI_Controller
{
    public function index($nama = '')
    // = '' nilai default = kosong jika tidak ada parameter nama dalam link
    //index bisa diisi parameter
    //nanti jatuhnya /index/$nama di link nya
    //$nama yg di index.php ambil value dari link
    {
        // $data berupa array = isi dari $data. judul adalah nama arraynya
        // bisa jadi variable ketika dipanggil
        //sepertinya $data itu syntax untuk deklarasi
        $data['judul'] = 'Homepage'; //dek. var. judul berisi string homepage
        $data['nama'] = $nama; //dek. var. nama berisi $data
        // dalam view bisa dimasukkan beberapa parameter seperti data
        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}
