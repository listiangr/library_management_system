<?php 

class Model_koleksi extends CI_Model
{
	// konstruktor
	function __construct()
	{
		parent:: __construct();
	}

    // menangani proses penambahan jumlah copy 
    public function updateCopy_bertambah($id_biblio)
    {
        // update jumlah copy dan sisa copy menjadi +1
        $this->db->set('jumlah_copy', 'jumlah_copy+1', false);
        $this->db->set('sisa_copy', 'sisa_copy+1', false);
        $this->db->where('id_biblio', $id_biblio);
        $this->db->update('biblio');
    }

    // menangani proses pengurangan jumlah copy 
    public function updateCopy_berkurang($id_biblio)
    {
        // update jumlah copy dan sisa copy menjadi -1
        $this->db->set('jumlah_copy', 'jumlah_copy-1', false);
        $this->db->set('sisa_copy', 'sisa_copy-1', false);
        $this->db->where('id_biblio', $id_biblio);
        $this->db->update('biblio');
    }

	// menangani proses create data koleksi
    public function simpan($data)
    {
        // insert data
        $this->db->insert('koleksi', $data);
        // kembalikan hasil 
        return $this->db->get('koleksi')->row_array();
    }

    // menangani proses update data koleksi
    public function ubah($id, $data)
    {
        // update data dengan kondisi (id)
        $this->db->where('id_koleksi', $id);
        $this->db->update('koleksi', $data);
        // kembalikan hasil 
        return $this->db->get('koleksi')->row_array();
    }

    // menangani proses delete data biblio
    public function hapus($id_koleksi)
    {
        // delete data dengan kondisi (id)
        $this->db->where('id_koleksi', $id_koleksi);
        $this->db->delete('koleksi');
    }
}