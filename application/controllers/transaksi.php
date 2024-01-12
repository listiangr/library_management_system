<?php

class Transaksi extends CI_Controller
{
	// konstruktor
    public function __construct()
    {
        parent:: __construct();
        // menghubungkan ke model transaksi
        $this->load->model('model_transaksi');
    }

    // pengaksesan controller transaksi
    public function index()
    { 
        // tampung data tabel join
        $bungkus['data'] = $this->model_transaksi->get_joinAll();
        // menghubungkan ke view transaksi
        $this->load->view('/transaksi/view_transaksi', $bungkus);
    }

    // menangani proses saat button tambah transaksi diklik
    public function tambah()
    {
        // select data tabel member
        $bungkus['member'] = $this->db->get('member')->result();
        // tampung data tabel join koleksi dan biblio
        $bungkus['koleksi'] = $this->model_transaksi->get_joinKB();
        // menghubungkan ke view create transaksi 
        $this->load->view('/transaksi/view_ctransaksi', $bungkus);
    }

    // menangani proses saat button simpan pada form diklik
    public function simpan()
    {
        // tampung data hasil input form
        $data = array(
            'id_member'         => $this->input->post('id_member'), 
            'id_koleksi'        => $this->input->post('id_koleksi'), 
            'tanggal_pinjam'    => $this->input->post('tanggal_pinjam'), 
            'tanggal_kembali'   => $this->input->post('tanggal_kembali')
        );
        // mengakses model transaksi untuk create data sirkulasi
        $query = $this->model_transaksi->simpan($data);
        // jika query benar
        if($query = true){
            // mengakses model transaksi untuk mengurangi stok dan update status
            $this->model_transaksi->updateStatus_StokBerkurang($this->input->post('id_koleksi'));
            // menampilkan pesan sukses 
            $this->session->set_flashdata('info', 'Data berhasil disimpan');
            // dialihkan ke controller transaksi
            redirect('transaksi');
        }
    }

    // menangani proses saat button edit transaksi diklik
    public function edit($id)
    {
        // select tabel sirkulasi dengan kondisi (id)
        $bungkus['data'] = $this->db->get_where('sirkulasi', ['id_sirkulasi' => $id])->row_array();
        // select data abel member
        $bungkus['member'] = $this->db->get('member')->result();
        // tampung data tabel join koleksi dan biblio
        $bungkus['koleksi'] = $this->model_transaksi->get_joinKB();
        // menghubungkan ke view update transaksi 
        $this->load->view('/transaksi/view_utransaksi', $bungkus);
    }

    // menangani proses saat button ubah pada form diklik
    public function ubah($id)
    {
        // tampung data hasil input form
        $data = array(
            'id_member'         => $this->input->post('id_member'), 
            'id_koleksi'        => $this->input->post('id_koleksi'), 
            'tanggal_pinjam'    => $this->input->post('tanggal_pinjam'), 
            'tanggal_kembali'   => $this->input->post('tanggal_kembali')
        );
        // mengakses model transaksi untuk update data sirkulasi
        $query = $this->model_transaksi->ubah($id, $data);
        // jika query benar
        if($query = true){
            // mengakses model transaksi untuk menambah stok dan update status
            $this->model_transaksi->updateStatus_StokBertambah($this->input->post('id_koleksi'));
            // menampilkan pesan sukses 
            $this->session->set_flashdata('info', 'Data berhasil diubah');
            // dialihkan ke controller transaksi
            redirect('transaksi');
        }
    }

}