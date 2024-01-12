<?php

class Biblio extends CI_Controller
{
	// konstruktor
    public function __construct()
    {
        parent:: __construct();
        // menghubungkan ke model biblio
        $this->load->model('model_biblio');
    }

    // pengaksesan controller biblio
    public function index()
    { 
        // select tabel biblio 
        $bungkus['data'] = $this->db->get('biblio')->result();
        // menghubungkan ke view biblio
        $this->load->view('/biblio/view_biblio', $bungkus);
    }

    // menangani proses saat button tambah biblio diklik
    public function tambah()
    {
        // menghubungkan ke view create biblio 
        $this->load->view('/biblio/view_cbiblio');
    }

    // menangani proses saat button simpan pada form diklik
    public function simpan()
    {
        // tampung data hasil input form
        $data = array(
            'kode_biblio'      => $this->input->post('kode_biblio'), 
            'judul_buku'       => $this->input->post('judul_buku'), 
            'nama_pengarang'   => $this->input->post('nama_pengarang'), 
            'nama_penerbit'    => $this->input->post('nama_penerbit'), 
            'tahun_terbit'     => $this->input->post('tahun_terbit'), 
            'jumlah_copy'      => $this->input->post('jumlah_copy'), 
            'sisa_copy'        => $this->input->post('sisa_copy')
        );
        // mengakses model biblio untuk create data biblio
        $query = $this->model_biblio->simpan($data);
        // jika query benar
        if($query = true){
            // menampilkan pesan sukses 
            $this->session->set_flashdata('info', 'Data berhasil disimpan');
            // dialihkan ke controller biblio
            redirect('biblio');
        }
    }

    // menangani proses saat button edit biblio diklik
    public function edit($id)
    {
        // select tabel biblio dengan kondisi (id)
        $bungkus['data'] = $this->db->get_where('biblio', ['id_biblio' => $id])->row_array();
        // menghubungkan ke view update biblio 
        $this->load->view('/biblio/view_ubiblio', $bungkus);
    }

    // menangani proses saat button ubah pada form diklik
    public function ubah($id)
    {
        // tampung data hasil input form
        $data = array(
            'kode_biblio'      => $this->input->post('kode_biblio'), 
            'judul_buku'       => $this->input->post('judul_buku'), 
            'nama_pengarang'   => $this->input->post('nama_pengarang'), 
            'nama_penerbit'    => $this->input->post('nama_penerbit'), 
            'tahun_terbit'     => $this->input->post('tahun_terbit'), 
            'jumlah_copy'      => $this->input->post('jumlah_copy'), 
            'sisa_copy'        => $this->input->post('sisa_copy')
        );
        // mengakses model biblio untuk update data biblio
        $query = $this->model_biblio->ubah($id, $data);
        // jika query benar
        if($query = true){
            // menampilkan pesan sukses 
            $this->session->set_flashdata('info', 'Data berhasil diubah');
            // dialihkan ke controller biblio
            redirect('biblio');
        }
    }
}