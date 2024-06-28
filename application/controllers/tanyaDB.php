<?php
class Mahasiswa extends CI_Controller
{
    public function caraPertama()
    {
        //siapkan datanya dulu
        // pake template $data = array('attribute di database' => 'ambil data dari post') 
        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'angkatan' => $angkatan,
            'semester' => $semester,
            'nohp' => $nohp,
            'alamat' => $alamat,
            'status,' => $status,
        );
        $this->db->insert('mahasiswa', $data);
    }

    public function caraKedua()
    {
        //membuat deklarasi variable terlebih dahulu
        // valuenya diambil dari post di view
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $angkatan = $this->input->post('angkatan');
        $semester = $this->input->post('semester');
        $nohp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');

        // 'nama, alamat, dan pekerjaan' disini sesuai nama kolom pada database
        // 'attribute' => 'variable yg di deklarasikan di atas'
        // bisa campur seperti cara ke-empat
        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'angkatan' => $angkatan,
            'semester' => $semester,
            'nohp' => $nohp,
            'alamat' => $alamat,
            'status' => $status
        );
        $this->DataMahasiswaModel->input_data($data, 'mahasiswa');
        redirect('DataMahasiswa/index');
    }
    public function caraKetiga()
    {
        $data = [
            "nim" => $this->input->post('nim', true),
            "nama" =>  $this->input->post('nim', true) . ' - ' . $this->input->post('nama', true),
            "jurusan" => $this->input->post('jurusan', true),
            "angkatan" => $this->input->post('angkatan', true),
            "semester" => $this->input->post('semester', true),
            "nohp" => $this->input->post('nohp', true),
            "angkatan" => $this->input->post('angkatan', true),
            "status" => $this->input->post('nim', true)
        ];

        //parameter pertama nama tabel
        $this->db->insert('mahasiswa', $data);
    }

    public function caraKeempat()
    {
        //membuat deklarasi variable terlebih dahulu
        // valuenya diambil dari post di view
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');

        // cara keempat adalah campuran dari cara kedua dan ketiga
        // yakni untuk nim dan nama di deklarasikan dulu variable nya
        // sedangkan untuk attribute lainnya langsung menggunakan post method
        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $this->input->post('jurusan'),
            'angkatan' => $this->input->post('angkatan'),
            'semester' => $this->input->post('semester'),
            'nohp' => $this->input->post('nohp'),
            'alamat' => $this->input->post('alamat'),
            'status' => $this->input->post('status')
        );

        $this->DataMahasiswaModel->input_data($data, 'mahasiswa');
        redirect('DataMahasiswa/index');
    }
}
