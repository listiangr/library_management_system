<?php 

class Model_biblio extends CI_Model
{
	// konstruktor
	function __construct()
	{
		parent:: __construct();
	}

	// menangani proses create data biblio
    public function simpan($data)
    {
        // insert data
        $this->db->insert('biblio', $data);
        // kembalikan hasil 
        return $this->db->get('biblio')->row_array();
    }

    // menangani proses update data biblio
    public function ubah($id, $data)
    {
        // update data dengan kondisi (id)
        $this->db->where('id_biblio', $id);
        $this->db->update('biblio', $data);
        // kembalikan hasil 
        return $this->db->get('biblio')->row_array();
    }
}