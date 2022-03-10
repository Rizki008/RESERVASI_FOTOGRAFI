<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model
{
	public function pesanan()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('paket', 'pemesanan.id_paket = paket.id_paket', 'left');
		$this->db->join('pembayaran', 'pemesanan.no_pesan = pembayaran.no_pesan', 'left');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('status_pesan=0');
		$this->db->order_by('id_pemesanan', 'desc');
		return $this->db->get()->result();
	}

	public function pesanan_diproses()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('paket', 'pemesanan.id_paket = paket.id_paket', 'left');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');

		$this->db->where('status_pesan=1');
		$this->db->order_by('id_pemesanan', 'desc');
		return $this->db->get()->result();
	}

	public function pesanan_dikirim()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('paket', 'pemesanan.id_paket = paket.id_paket', 'left');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('status_pesan=2');
		$this->db->order_by('id_pemesanan', 'desc');
		return $this->db->get()->result();
	}

	public function pesanan_selesai()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('paket', 'pemesanan.id_paket = paket.id_paket', 'left');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('status_pesan=3');
		$this->db->order_by('id_pemesanan', 'desc');
		return $this->db->get()->result();
	}

	public function pesanan_dibatalkan()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('paket', 'pemesanan.id_paket = paket.id_paket', 'left');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('status_pesan=4');
		$this->db->order_by('id_pemesanan', 'desc');
		return $this->db->get()->result();
	}

	public function update_order($data)
	{
		$this->db->where('id_pemesanan', $data['id_pemesanan']);
		$this->db->update('pemesanan', $data);
	}

	public function diproses_pesanan()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('pembayaran', 'pemesanan.no_pesan = pembayaran.no_pesan', 'left');
		$this->db->join('paket', 'pembayaran.id_paket = paket.id_paket', 'left');
		return $this->db->get()->row();
	}

	public function proses_kirim()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('pembayaran', 'pemesanan.no_pesan = pembayaran.no_pesan', 'left');
		$this->db->join('paket', 'pembayaran.id_paket = paket.id_paket', 'left');
		return $this->db->get()->result();
	}
}
