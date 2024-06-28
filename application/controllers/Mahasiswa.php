<?php
class Mahasiswa extends CI_Controller
{

    //construct untuk manggil satu method di semua function dalam 1 kelas
    //kalo banyak kelas ditaruhnya di config/autoload

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswaModel');
        $this->load->library('form_validation');
    }
    public function index()
    // = '' nilai default = kosong jika tidak ada parameter nama dalam link
    //index bisa diisi parameter
    //nanti jatuhnya /index/$nama di link nya
    //$nama yg di index.php ambil value dari link
    {
        $data['judul'] = 'Homepage Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswaModel->tampilData()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';
        //untuk validasi data yg di dalam set_rules(
        //parameter pertama itu value 'name' dari View nya,
        //parameter kedua itu yang mau ditampilkan jika ada error,
        //parameter ketiga itu rulesnya)

        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|numeric');
        $this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('nohp', 'NO.HP', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->mahasiswaModel->tambahDataMahasiswa();

            //parameternya ada 2, sessionnya apa, isinya apa
            //set_flashdata() untuk nge-set, kalo flashdata() aja yg di view buat nampilin
            $this->session->set_flashdata('flash', 'Ditambahkan');

            redirect('mahasiswa'); //ini masuk ke controller mahasiswa
        }
    }

    public function hapus($nim)
    {
        $this->mahasiswaModel->hapusDataMahasiswa($nim);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }
}
