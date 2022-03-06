<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
	public function lap_harian($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('pemesanan', 'pemesanan.no_pesan = pembayaran.no_pesan', 'left');
		$this->db->join('paket', 'paket.id_paket = pembayaran.id_paket', 'left');
		$this->db->where('DAY(pemesanan.tgl_order)', $tanggal);
		$this->db->where('MONTH(pemesanan.tgl_order)', $bulan);
		$this->db->where('YEAR(pemesanan.tgl_order)', $tahun);
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}

	public function lap_bulanan($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('pemesanan', 'pemesanan.no_pesan = pembayaran.no_pesan', 'left');
		$this->db->join('paket', 'paket.id_paket = pembayaran.id_paket', 'left');
		$this->db->where('MONTH(tgl_order)', $bulan);
		$this->db->where('YEAR(tgl_order)', $tahun);
		$this->db->where('status_bayar=1');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}

	public function lap_tahunan($tahun)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('pemesanan', 'pemesanan.no_pesan = pembayaran.no_pesan', 'left');
		$this->db->join('paket', 'paket.id_paket = pembayaran.id_paket', 'left');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('YEAR(tgl_order)', $tahun);
		$this->db->where('status_bayar=1');
		$this->db->order_by('qty', 'desc');

		return $this->db->get()->result();
	}
}

/* End of file M_laporan.php */
