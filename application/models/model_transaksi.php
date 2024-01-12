<?php 

class Model_transaksi extends CI_Model
{
	// konstruktor
	function __construct()
	{
		parent:: __construct();
	}

    // mendapatkan semua data tabel dengan cara join 
    public function get_joinAll()
    {
        // select dari tabel sirkulasi
        $this->db->select('*');
        $this->db->from('sirkulasi');
        // gabungkan dengan tabel member
        $this->db->join('member', 'sirkulasi.id_member = member.id_member');
        // gabungkan dengan tabel koleksi
        $this->db->join('koleksi', 'sirkulasi.id_koleksi = koleksi.id_koleksi');
        // gabungkan dengan tabel biblio
        $this->db->join('biblio', 'koleksi.id_biblio = biblio.id_biblio');
        // kembalikan hasil
        return $this->db->get()->result();
    }

    // mendapatkan data tabel koleksi dan biblio dengan cara join 
    public function get_joinKB()
    {
        // select dari tabel sirkulasi
        $this->db->select('*');
        $this->db->from('koleksi');
        // gabungkan dengan tabel biblio
        $this->db->join('biblio', 'koleksi.id_biblio = biblio.id_biblio');
        // kembalikan hasil
        return $this->db->get()->result();
    }

    // menangani proses pengurangan sisa copy dan update status
    public function updateStatus_StokBerkurang($id_koleksi)
    {
        // update status menjadi tidak tersedia
        $this->db->set('status', 'Tidak Tersedia');
        $this->db->where('id_koleksi', $id_koleksi);
        $this->db->update('koleksi');

        // dapatkan id biblio dari tabel koleksi
        $query = $this->db->query("select * from koleksi where id_koleksi = $id_koleksi");
        foreach($query->result_array() as $field){
            $id_biblio = $field['id_biblio'];
        }

        // update sisa copy menjadi -1
        $this->db->set('sisa_copy', 'sisa_copy-1', false);
        $this->db->where('id_biblio', $id_biblio);
        $this->db->update('biblio');
    }

    // menangani proses penambahan sisa copy dan update status
    public function updateStatus_StokBertambah($id_koleksi)
    {
        // update status menjadi tersedia
        $this->db->set('status', 'Tersedia');
        $this->db->where('id_koleksi', $id_koleksi);
        $this->db->update('koleksi');

        // dapatkan id biblio dari tabel koleksi
        $query = $this->db->query("select * from koleksi where id_koleksi = $id_koleksi");
        foreach($query->result_array() as $field){
            $id_biblio = $field['id_biblio'];
        }

        // update sisa copy menjadi +1
        $this->db->set('sisa_copy', 'sisa_copy+1', false);
        $this->db->where('id_biblio', $id_biblio);
        $this->db->update('biblio');
    }

	// menangani proses create data transaksi
    public function simpan($data)
    {
        // insert data
        $this->db->insert('sirkulasi', $data);
        // kembalikan hasil 
        return $this->db->get('sirkulasi')->row_array();
    }

    // menangani proses update data transaksi
    public function ubah($id, $data)
    {
        // update data dengan kondisi (id)
        $this->db->where('id_sirkulasi', $id);
        $this->db->update('sirkulasi', $data);
        // kembalikan hasil 
        return $this->db->get('sirkulasi')->row_array();
    }

}