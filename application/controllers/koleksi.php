<?php

class Koleksi extends CI_Controller
{
	// konstruktor
    public function __construct()
    {
        parent:: __construct();
        // menghubungkan ke model koleksi
        $this->load->model('model_koleksi');
    }

    // pengaksesan controller koleksi
    public function index($id)
    { 
        // select tabel biblio dan koleksi dengan kondisi (id)
        $bungkus['biblio'] = $this->db->get_where('biblio', ['id_biblio' => $id])->row_array();
        $bungkus['koleksi'] = $this->db->get_where('koleksi', ['id_biblio' => $id])->result();
        // menghubungkan ke view update koleksi 
        $this->load->view('/koleksi/view_koleksi', $bungkus);
    }

    // menangani proses saat button tambah biblio diklik
    public function tambah($id)
    {
        // menghubungkan ke view create biblio 
        $bungkus['data'] = $id;
        $this->load->view('/koleksi/view_ckoleksi', $bungkus);
    }

    // menangani proses saat button simpan pada form diklik
    public function simpan($id)
    {
        // tampung data hasil input form
        $data = array(
            'id_biblio' => $id, 
            'noreg'     => $this->input->post('noreg'), 
            'status'    => $this->input->post('status')
        );
        // mengakses model koleksi untuk create data koleksi
        $query = $this->model_koleksi->simpan($data);
        // jika query benar
        if($query = true){
            // mengakses model koleksi untuk menambah jumlah copy 
            $this->model_koleksi->updateCopy_bertambah($id);
            // menampilkan pesan sukses 
            $this->session->set_flashdata('info', 'Data berhasil disimpan');
            // dialihkan ke controller biblio
            redirect('biblio');
        }
    }

    // menangani proses saat button edit biblio diklik
    public function edit($id)
    {
        // select tabel koleksi dengan kondisi (id)
        $bungkus['data'] = $this->db->get_where('koleksi', ['id_koleksi' => $id])->row_array();
        // menghubungkan ke view update koleksi
        $this->load->view('/koleksi/view_ukoleksi', $bungkus);
    }

    // menangani proses saat button ubah pada form diklik
    public function ubah($id)
    {
        // tampung data hasil input form
        $data = array(
            'id_biblio' => $this->input->post('id_biblio'), 
            'noreg'     => $this->input->post('noreg'), 
            'status'    => $this->input->post('status')
        );
        // mengakses model koleksi untuk update data koleksi
        $query = $this->model_koleksi->ubah($id, $data);
        // jika query benar
        if($query = true){
            // menampilkan pesan sukses 
            $this->session->set_flashdata('info', 'Data berhasil diubah');
            // dialihkan ke controller biblio
            redirect('biblio');
        }
    }

    // menangani proses saat button hapus diklik
    public function hapus($id_koleksi, $id_biblio)
    {
        // mengakses model koleksi untuk delete data koleksi
        $query = $this->model_koleksi->hapus($id_koleksi);
        // jika query benar
        if($query = true){
            // mengakses model koleksi untuk mengurangi jumlah copy
            $this->model_koleksi->updateCopy_berkurang($id_biblio);
            // tampilkan pesan sukses
            $this->session->set_flashdata('info', 'Data berhasil dihapus');
            // dialihkan ke controller biblio
            redirect('biblio');
        }
    }
}