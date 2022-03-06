<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
	}

	public function index()
	{
		// if (empty($this->cart->contents())) {
		//     redirect('home');
		// }
		$data = array(
			'title' => 'Produk',
			'keranjang' => $this->m_transaksi->keranjang(),
			'isi' => 'layout/frontend/pesanan/v_cart'
		);
		$this->load->view('layout/frontend/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$redirect_page =  $this->input->post('redirect_page');
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
		);

		$this->cart->insert($data);
		redirect($redirect_page, 'refresh');
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('pesan');
	}

	public function update()
	{
		$this->m_transaksi->update_keranjang();
		redirect('pesan/cekout');
	}

	public function clear()
	{
		$this->cart->destroy();
		redirect('cart');
	}

	public function cekout()
	{
		//proteksi halaman
		$this->pelanggan_login->proteksi_halaman();

		$this->form_validation->set_rules('tanggal_jadwal', 'Tanggal Foto', 'required|is_unique[pemesanan.tanggal_jadwal]', array(
			'required' => '%sMohon Untuk Disiis !!!',
			'is_unique' => '%s Sudah ada yang boking !!!'
		));

		// $this->form_validation->set_rules('nama_pelanggan', 'Nama Lengkap', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
		// 'required' => '%s Mohon Untuk Diisi!!!',
		// 'alpha' => '%s Mohon Isi dengan Huruf!!!'
		// ));
		$this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Langsung Beli',
				'keranjang' => $this->m_transaksi->cekout(),
				'boking' => $this->m_transaksi->jadwal_boking(),
				'isi' => 'layout/frontend/pesanan/v_cekout'
			);
			$this->load->view('layout/frontend/v_wrapper', $data, FALSE);
		} else {
			$tgl1 = date('Y-m-d');
			$tgl2 = date('Y-m-d', strtotime('+ 5 days', strtotime($tgl1)));
			$tgl = $this->input->post('tanggal_jadwal');
			if ($tgl <= $tgl2) {
				$this->session->set_flashdata('pesan', 'Pesanan Kurang dari 5 hari');
				redirect('pesan/cekout');
			} else {
				//simpan ke tabel transaksi
				$data = array(
					'id_pelanggan' => $this->session->userdata('id_pelanggan'),
					'id_paket' => $this->input->post('id_paket'),
					'no_pesan' => $this->input->post('no_pesan'),
					'tgl_order' => date('Y-m-d'),
					'tanggal_jadwal' => $this->input->post('tanggal_jadwal'),
					// 'nama_pelanggan' => $this->input->post('nama_pelanggan'),
					'jumlah_bayar' => $this->input->post('jumlah_bayar'),
					'pembayaran' => $this->input->post('pembayaran'),
					'checked'       => TRUE,
					'status_bayar' => '0',
					'status_pesan' => '0',
				);
				$this->m_transaksi->simpan_pesanan($data);

				//simpan ke tabel rinci transaksi
				$i = 1;
				foreach ($this->m_transaksi->cekout() as $item) {
					$data_rinci = array(
						'no_pesan' => $this->input->post('no_pesan'),
						'id_paket' => $item->id_paket,
						'qty' => $this->input->post('qty' . $i++),
					);

					$this->m_transaksi->simpan_pembayaran($data_rinci);
				}
				foreach ($this->m_transaksi->cekout() as $value) {

					$this->db->where('id_keranjang', $value->id_keranjang);
					$this->db->delete('keranjang');
				}
				$this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');

				redirect('pesanan_saya');
			}
		}
	}

	public function cekout_foto()
	{
		//proteksi halaman
		$this->pelanggan_login->proteksi_halaman();

		$this->form_validation->set_rules('tanggal_jadwal', 'Tanggal Foto', 'required|is_unique[pemesanan.tanggal_jadwal]', array(
			'required' => '%sMohon Untuk Disiis !!!',
			'is_unique' => '%s Sudah ada yang boking !!!'
		));

		// $this->form_validation->set_rules('nama_pelanggan', 'Nama Lengkap', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
		// 'required' => '%s Mohon Untuk Diisi!!!',
		// 'alpha' => '%s Mohon Isi dengan Huruf!!!'
		// ));
		$this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Langsung Beli',
				'keranjang' => $this->m_transaksi->cekout(),
				'boking' => $this->m_transaksi->jadwal_boking(),
				'isi' => 'layout/frontend/pesanan/v_cekout'
			);
			$this->load->view('layout/frontend/v_wrapper', $data, FALSE);
		} else {
			//simpan ke tabel transaksi
			$data = array(
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'id_paket' => $this->input->post('id_paket'),
				'no_pesan' => $this->input->post('no_pesan'),
				'tgl_order' => date('Y-m-d'),
				'tanggal_jadwal' => $this->input->post('tanggal_jadwal'),
				// 'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'jumlah_bayar' => $this->input->post('jumlah_bayar'),
				'pembayaran' => $this->input->post('pembayaran'),
				'checked'       => TRUE,
				'status_bayar' => '0',
				'status_pesan' => '0',
			);
			$this->m_transaksi->simpan_pesanan($data);

			//simpan ke tabel rinci transaksi
			$i = 1;
			foreach ($this->m_transaksi->cekout() as $item) {
				$data_rinci = array(
					'no_pesan' => $this->input->post('no_pesan'),
					'id_paket' => $item->id_paket,
					'qty' => $this->input->post('qty' . $i++),
				);
				$this->m_transaksi->simpan_pembayaran($data_rinci);
			}
			foreach ($this->m_transaksi->cekout() as $value) {
				$this->db->where('id_keranjang', $value->id_keranjang);
				$this->db->delete('keranjang');
			}
			$this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
			redirect('pesanan_saya');
		}
	}

	public function keranjang($id_paket)
	{
		$redirect_page =  $this->input->post('redirect_page');
		$this->pelanggan_login->proteksi_halaman();
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'title' => 'Langsung Beli',
				'isi' => 'layout/frontend/pesanan/v_cart'
			);
			$this->load->view('layout/frontend/v_wrapper', $data, FALSE);
		} else {
			//simpan ke tabel keranjang
			$data = array(
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'status' => '0',
				'id_paket' => $id_paket
			);
			$this->m_transaksi->simpan_keranjang($data);
			$this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
			redirect($redirect_page, 'refresh');
		}
	}

	public function hapus($id_keranjang = NULL)
	{
		$data = array(
			'id_keranjang' => $id_keranjang
		);
		$this->m_transaksi->hapus($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('pesan');
	}
}
