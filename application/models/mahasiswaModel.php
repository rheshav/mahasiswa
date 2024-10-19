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
            "alamat" => $this->input->post('alamat', true),
            "semester" => $this->input->post('semester', true),
            "nohp" => $this->input->post('nohp', true),
            "angkatan" => $this->input->post('angkatan', true),
            "status" => $this->input->post('status', true),
            "tanggal" => date('d-m-Y')
        ];

        //parameter pertama nama tabel
        $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($no)
    {
        // $this->db->where('nim', $nim);
        $this->db->delete('mahasiswa', ['no' => $no]);
    }

    public function getMahasiswaByNIM($no)
    {
        //syntax dibawah parameter nim di database ambil data dari $nim yg di view
        return $this->db->get_where('mahasiswa', ['no' => $no])->row_array();
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

    public function get_duplicate_by_tanggal()
    {
        return $this->db->get('mahasiswa')->result_array();
    }
}

// jika tanggal tidak null
// ambil semua no.admisi pada current "tanggal" di database

// insert (duplikat):
// yg di unset ID, createDate
// semua sama kecuali tanggal +1