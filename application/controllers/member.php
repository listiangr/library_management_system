<?php

class Member extends CI_Controller
{
	// konstruktor
    public function __construct()
    {
        parent:: __construct();
        // menghubungkan ke model member
        $this->load->model('model_member');
    }

    // pengaksesan controller member
    public function index()
    { 
        // select tabel member 
        $bungkus['data'] = $this->db->get('member')->result();
        // menghubungkan ke view member
        $this->load->view('/member/view_member', $bungkus);
    }

    // menangani proses saat button tambah member diklik
    public function tambah()
    {
        // menghubungkan ke view create member 
        $this->load->view('/member/view_cmember');
    }

    // menangani proses saat button simpan pada form diklik
    public function simpan()
    {
        // tampung data hasil input form
        $data = array(
            'kode_member'       => $this->input->post('kode_member'), 
            'nama_member'       => $this->input->post('nama_member'), 
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'), 
            'nomor_telepon'     => $this->input->post('nomor_telepon'), 
            'alamat_email'      => $this->input->post('alamat_email'), 
            'alamat_rumah'      => $this->input->post('alamat_rumah'), 
            'tanggal_gabung'    => $this->input->post('tanggal_gabung')
        );
        // mengakses model member untuk create data member
        $query = $this->model_member->simpan($data);
        // jika query benar
        if($query = true){
            // menampilkan pesan sukses 
            $this->session->set_flashdata('info', 'Data berhasil disimpan');
            // dialihkan ke controller member
            redirect('member');
        }
    }

    // menangani proses saat button edit member diklik
    public function edit($id)
    {
        // select tabel member dengan kondisi (id)
        $bungkus['data'] = $this->db->get_where('member', ['id_member' => $id])->row_array();
        // menghubungkan ke view update member 
        $this->load->view('/member/view_umember', $bungkus);
    }

    // menangani proses saat button ubah pada form diklik
    public function ubah($id)
    {
        // tampung data hasil input form
        $data = array(
            'kode_member'       => $this->input->post('kode_member'), 
            'nama_member'       => $this->input->post('nama_member'), 
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'), 
            'nomor_telepon'     => $this->input->post('nomor_telepon'), 
            'alamat_email'      => $this->input->post('alamat_email'), 
            'alamat_rumah'      => $this->input->post('alamat_rumah'), 
            'tanggal_gabung'    => $this->input->post('tanggal_gabung')
        );
        // mengakses model member untuk update data member 
        $query = $this->model_member->ubah($id, $data);
        // jika query benar
        if($query = true){
            // menampilkan pesan sukses 
            $this->session->set_flashdata('info', 'Data berhasil diubah');
            // dialihkan ke controller member
            redirect('member');
        }
    }

    // menangani proses saat button hapus diklik
    public function hapus($id)
    {
        // mengakses model member untuk delete data member
        $query = $this->model_member->hapus($id);
        // jika query benar
        if($query = true){
            // tampilkan pesan sukses
            $this->session->set_flashdata('info', 'Data berhasil dihapus');
            // dialihkan ke controller member
            redirect('member');
        }
    }
}