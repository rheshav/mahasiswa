<?php
class mahasiswaModel extends CI_Model
{
    public function tampilData()
    {
        // $query = $this->db->get('mahasiswa');
        // return $query->result_array();

        return $this->db->get('mahasiswa');
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

    public function hapusDataMahasiswa($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete('mahasiswa');
    }
}
