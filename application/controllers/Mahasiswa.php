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
        $this->load->helper('form');
    }
    public function index()
    // = '' nilai default = kosong jika tidak ada parameter nama dalam link
    //index bisa diisi parameter
    //nanti jatuhnya /index/$nama di link nya
    //$nama yg di index.php ambil value dari link
    {
        $data['judul'] = 'Homepage Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswaModel->tampilData();
        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->mahasiswaModel->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
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

    public function detail($nim)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        //$data dibawah itu deklarasi array 'mahasiswa'
        //nanti di view biar bisa dipanggil pake $mahasiswa langsung
        $data['mahasiswa'] = $this->mahasiswaModel->getMahasiswaByNIM($nim);

        //$data dibawah ini berisikan banyak key, jadi misal ada  $data['judul'] & $data['mahasiswa']
        //value yg dipanggil mengikuti key yg digunakan
        //misal $judul akan menampilkan value dari judul
        //$mahasiswa juga sama, meskipun $judul & $mahasiswa dipanggil dalam 1 file (contoh di detail.php)
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');
    }

    //$nim di dalam function diambil dari URL
    public function edit($nim)
    {
        $data['judul'] = 'Form Edit Data Mahasiswa';
        //syntax dibawah untuk mendeklarasikan key 'mahasiswa' dalam variable $data yang berisi 
        //data mahasiswa berdasarkan nim "getMahasiswaByNIM($nim)" di model
        $data['mahasiswa'] = $this->mahasiswaModel->getMahasiswaByNIM($nim);

        $data['jurusan'] = ['Informatika', 'Matematika', 'Kimia', 'Fisika', 'Biologi'];

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
            $this->load->view('mahasiswa/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->mahasiswaModel - editDataMahasiswa();

            //parameternya ada 2, sessionnya apa, isinya apa
            //set_flashdata() untuk nge-set, kalo flashdata() aja yg di view buat nampilin
            $this->session->set_flashdata('flash', 'Diedit');

            redirect('mahasiswa'); //ini masuk ke controller mahasiswa
        }
    }
}
