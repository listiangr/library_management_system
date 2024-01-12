<?php 

class Model_member extends CI_Model
{
	// konstruktor
	function __construct()
	{
		parent:: __construct();
	}

	// menangani proses create data member
    public function simpan($data)
    {
        // insert data
        $this->db->insert('member', $data);
        // kembalikan hasil 
        return $this->db->get('member')->row_array();
    }

    // menangani proses update data member
    public function ubah($id, $data)
    {
        // update data dengan kondisi (id)
        $this->db->where('id_member', $id);
        $this->db->update('member', $data);
        // kembalikan hasil 
        return $this->db->get('member')->row_array();
    }

    // menangani proses delete data member
    public function hapus($id)
    {
        // delete data dengan kondisi (id)
        $this->db->where('id_member', $id);
        $this->db->delete('member');
    }
}