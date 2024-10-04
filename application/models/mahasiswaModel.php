<?php
class mahasiswaModel extends CI_Model
{
    public function tampilData()
    {
        // $query = $this->db->get('mahasiswa');
        // return $query->result_array();

        return $this->db->get('mahasiswa')->result_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nim" => $this->input->post('nim', true),
            "nama" => $this->input->post('nama', true),
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

    public function hapusDataMahasiswa($no)
    {
        // $this->db->where('nim', $nim);
        $this->db->delete('mahasiswa', ['no' => $no]);
    }

    public function getMahasiswaByNIM($nim)
    {
        //syntax dibawah parameter nim di database ambil data dari $nim yg di view
        return $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
    }
    public function editDataMahasiswa()
    {
        $data = [
            "nim" => $this->input->post('nim', true),
            "nama" => $this->input->post('nama', true),
            "jurusan" => $this->input->post('jurusan', true),
            "angkatan" => $this->input->post('angkatan', true),
            "semester" => $this->input->post('semester', true),
            "nohp" => $this->input->post('nohp', true),
            "angkatan" => $this->input->post('angkatan', true),
            "status" => $this->input->post('nim', true)
        ];


        //parameter pertama nama tabel pada database
        $this->db->update('mahasiswa', $data);
    }
    public function cariDataMahasiswa()
    {
        //post('keyword') keyword disini diambil dari post HTML name="keyword"
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nim', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('angkatan', $keyword);
        $this->db->or_like('semester', $keyword);
        $this->db->or_like('nohp', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }

    public function get_duplicate()
    {
        return $this->db->get('mahasiswa')->result_array();
    }
}
