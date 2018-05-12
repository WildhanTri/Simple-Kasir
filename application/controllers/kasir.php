<?php

defined('BASEPATH') or exit ('No Direct script access allowed');

class kasir extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('kasir_model');
    }
    
    function randomGen($jumlahChar){
        $karakter = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $key = "";
        for($a=0; $a<$jumlahChar; $a++){
            $arrChar = rand(0, strlen($karakter)-1);
            $key .= $karakter[$arrChar];
        }
        return $key;
    }
    
    function index(){
        if($this->session->userdata('nama') != null){
            $data = array (
                "page" => "Kasir"
            );
            $this->load->view('kasir/kasir', $data);
        }else{
            $data = array (
                "page" => "Login"
            );
            $this->load->view('login', $data);
        }
    }
    function login(){
        $this->load->view('login');
    }
 
	function prosesLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->kasir_model->selectWhere("user",$where);
		if(count($cek) > 0){
 
			$data_session = array(
				'id_user' => $cek[0]->id_user,
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("index.php/kasir"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
    
    //////Kasir///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function menuKasir(){
        $data = array (
            "page" => "MenuKasir"
        );
        $this->load->view('kasir/kasir', $data);
    }
    function identifikasiProduk($idproduk){
        $barang = $this->kasir_model->select2TableWhere('barang','barang_kategori', 'barang.kategori_barang = barang_kategori.id_kategori', array("deleted_on" => null, "id_barang" => $idproduk), "","");
 
        if($barang == true){
            $data = array (
                'nama_barang' => $barang[0]->nama_barang,
                'harga_barang' => $barang[0]->harga_barang,
                'stok_barang' => $barang[0]->stok_barang,
                'status' => "success"
            );
        }else{
            $data = array (
                'nama_barang' => "Tidak Ditemukan",
                'harga_barang' => "Tidak Ditemukan",
                'stok_barang' => "Tidak DItemukan",
                'status' => "failed"
            );
        }
        
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
    function konfirmasiBelanja(){
        $transaksi = $this->kasir_model->selectLastID("kasir", "transaksi");
        $idtransaksi = $transaksi[0]->AUTO_INCREMENT;
        $data = array (
            'total_harga_belanja' => $this->input->post('inputtotalharga'),
            'jumlah_bayar' => $this->input->post('inputjumlahbayar'),
            'jumlah_kembali' => $this->input->post('inputjumlahkembali'),
            'id_user' => $this->session->userdata('id_user')
        );
        $this->kasir_model->insert('transaksi',$data);
        $jumlahbarang = count($this->input->post('idproduk'));
        for($a=0; $a<$jumlahbarang; $a++){
            $data = array (
                'id_transaksi' => $idtransaksi,
                'id_barang' => $this->input->post('idproduk')[$a],
                'qty_barang' => $this->input->post('qtyproduk')[$a],
                
            );
            $this->kasir_model->insert('transaksi_detail',$data);
        }
        redirect(base_url('index.php/kasir/menuKasir'), "refresh");
    }
    
    //////Barang///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function menuBarang($id=null){
        $jml = $this->db->get('barang');
        
        
        //pengaturan pagination
        $config['base_url'] = base_url().'index.php/kasir/menuBarang';
        $config['use_page_numbers'] = false;
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '5';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        
        $barang = $this->kasir_model->select2TableWhere('barang','barang_kategori', 'barang.kategori_barang = barang_kategori.id_kategori', array("deleted_on" => null), $config['per_page'], $id);
        
        $this->pagination->initialize($config);
        $data = array (
            'barang' => $barang,
            'page' => "MenuBarang",
            'halaman' => $this->pagination->create_links(),
            
        );
        
        $this->load->view('barang/barang', $data);
    }
    function tambahBarang(){
        $kategori = $this->kasir_model->select('barang_kategori');
        $data = array (
            'kategori' => $kategori,
            'page' => "MenuBarang"
        );
        $this->load->view('barang/tambahbarang', $data);
    }
    function prosesTambahBarang(){
        require_once("../kasir/assets/phpqrcode/qrlib.php");
        $id = $this->randomGen(5);
        $data = array (
            'id_barang' => $id,
            'nama_barang' => $this->input->post('namabarang'),
            'kategori_barang' => $this->input->post('kategoribarang'),
            'harga_barang' => $this->input->post('hargabarang'),
            'stok_barang' => $this->input->post('stokbarang'),
        );
        $this->kasir_model->insert('barang',$data);
        $tempdir = '../kasir/data/qrcodebarang/';
        if(!file_exists($tempdir)){
            mkdir($tempdir);
        }
        $isi_teks = $id;
        $namaFile = $id.'.jpg';
        $quality = 'H';
        $ukuran = 5;
        $padding = 2;
        
        QRCode::png($isi_teks, $tempdir.$namaFile, $quality, $ukuran, $padding);
        redirect(base_url('index.php/kasir/menuBarang'), "refresh");
    }
    function editBarang($idbarang){
        $kategori = $this->kasir_model->select('barang_kategori');
        $barang = $this->kasir_model->selectWhere('barang', array('id_barang' => $idbarang));
        $data = array (
            'kategori' => $kategori,
            'barang' => $barang,
            'page' => "MenuBarang"
        );
        $this->load->view('barang/editbarang', $data);
    }
    function prosesUbahBarang($idbarang){
        $data = array (
            'nama_barang' => $this->input->post('namabarang'),
            'kategori_barang' => $this->input->post('kategoribarang'),
            'harga_barang' => $this->input->post('hargabarang'),
            'stok_barang' => $this->input->post('stokbarang'),
            'updated_on' => date('Y-m-d H:i:s')
        );
        $where = array (
            'id_barang' => $idbarang
        
        );
        $this->kasir_model->updateWhere('barang',$data,$where);
        redirect(base_url('index.php/kasir/menuBarang'), "refresh");
    }
    function prosesHapusBarang($idbarang){
        $data = array(
            'deleted_on' => date('Y-m-d H:i:s')
        );
        $where = array(
            'id_barang' => $idbarang
        );
        $data = $this->kasir_model->updateWhere('barang', $data, $where);
        redirect(base_url('index.php/kasir/menuBarang'), 'refresh');
    }
    function prosesSortBarang(){
        $sortBy = $this->input->post("sortBy");
        $sortType = $this->input->post("sortType");
        $barang = $this->kasir_model->select2TableWhereOrderBy('barang','barang_kategori', 'barang.kategori_barang = barang_kategori.id_kategori', array("deleted_on" => null), $sortBy, $sortType);
        $data = array (
            'barang' => $barang
        );
        $this->load->view('barang/advbarang', $data);
    }
    
    function prosesSearchBarang($id=null){
        $config['base_url'] = base_url().'index.php/kasir/prosesSearchBarang';
        $config['use_page_numbers'] = false;
        $config['per_page'] = '10';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        $searchBy = $this->input->post("searchBy");
        $searchKey = $this->input->post("searchKey");
        $barang = $this->kasir_model->select2TableWhere('barang','barang_kategori', 'barang.kategori_barang = barang_kategori.id_kategori', array("deleted_on" => null, $searchBy => $searchKey), $config['per_page'], $id);
        
        $config['total_rows'] = count($barang[0]);
        $this->pagination->initialize($config);
        
        $data = array (
            'barang' => $barang,
            'searchBy' => $searchBy,
            'searchKey' => $searchKey,
            'page' => "MenuBarang",
            'halaman' => $this->pagination->create_links(),
        );
        $this->load->view('barang/barang', $data);
    }
    
    //////K  A  S  I  R///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function menuTransaksi($id=null){
        $jml = $this->db->get('transaksi');
        $config['base_url'] = base_url().'index.php/kasir/menuTransaksi';
        $config['use_page_numbers'] = false;
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '10';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        
        $this->pagination->initialize($config);
        $transaksi = $this->kasir_model->select2Table('transaksi', 'user', 'transaksi.id_user = user.id_user',$config['per_page'], $id);
        $data = array (
            'transaksi' => $transaksi,
            'page' => "MenuTransaksi",
            'halaman' => $this->pagination->create_links(),
        );
        $this->load->view('transaksi/transaksi', $data);
    }
    
    function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/kasir/'));
	}
}

?>
