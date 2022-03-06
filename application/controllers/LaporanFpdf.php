<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporanfpdf extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
		$this->load->model('m_laporan');
	}
	function index()
	{
		$tahun = $this->input->post('tahun');
		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('L', 'mm', 'Letter');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'LAPORAN PERTAHUN SELECTA', 0, 1, 'C');
		$pdf->SetFont('Arial', 'I', 12);
		$pdf->Cell(0, 7, 'Jl. Kartabraja Timur No.3 Malausma Majalengka', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 6, 'No', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Nomor Boking', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Tanggal Boking', 1, 0, 'C');
		$pdf->Cell(50, 6, 'Nama Paket', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Harga Paket', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Diskon Paket', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Pembayaran Paket', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$pemesanan = $this->m_laporan->lap_tahunan($tahun);
		$no = 0;
		foreach ($pemesanan as $data) {
			$no++;
			$pdf->Cell(10, 6, $no, 1, 0, 'C');
			$pdf->Cell(40, 6, $data->name, 1, 0);
			$pdf->Cell(35, 6, $data->no_pesan, 1, 0);
			$pdf->Cell(30, 6, $data->tgl_order, 1, 0);
			$pdf->Cell(50, 6, $data->nama_paket, 1, 0);
			$pdf->Cell(30, 6, $data->harga, 1, 0);
			$pdf->Cell(30, 6, $data->diskon, 1, 0);
			$pdf->Cell(35, 6, $data->bayar, 1, 1);
		}
		$pdf->Output();
	}

	function bulan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('L', 'mm', 'Letter');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'LAPORAN PERBULAN SELECTA', 0, 1, 'C');
		$pdf->SetFont('Arial', 'I', 12);
		$pdf->Cell(0, 7, 'Jl. Kartabraja Timur No.3 Malausma Majalengka', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 6, 'No', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Nomor Boking', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Tanggal Boking', 1, 0, 'C');
		$pdf->Cell(50, 6, 'Nama Paket', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Harga Paket', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Diskon Paket', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Pembayaran Paket', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$pemesanan = $this->m_laporan->lap_bulanan($bulan, $tahun);
		$no = 0;
		foreach ($pemesanan as $data) {
			$no++;
			$pdf->Cell(10, 6, $no, 1, 0, 'C');
			$pdf->Cell(40, 6, $data->name, 1, 0);
			$pdf->Cell(35, 6, $data->no_pesan, 1, 0);
			$pdf->Cell(30, 6, $data->tgl_order, 1, 0);
			$pdf->Cell(50, 6, $data->nama_paket, 1, 0);
			$pdf->Cell(30, 6, $data->harga, 1, 0);
			$pdf->Cell(30, 6, $data->diskon, 1, 0);
			$pdf->Cell(35, 6, $data->bayar, 1, 1);
		}
		$pdf->Output();
	}

	function hari()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('L', 'mm', 'Letter');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'LAPORAN PERHARI SELECTA', 0, 1, 'C');
		$pdf->SetFont('Arial', 'I', 12);
		$pdf->Cell(0, 7, 'Jl. Kartabraja Timur No.3 Malausma Majalengka', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 6, 'No', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Nomor Boking', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Tanggal Boking', 1, 0, 'C');
		$pdf->Cell(50, 6, 'Nama Paket', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Harga Paket', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Diskon Paket', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Pembayaran Paket', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$pemesanan = $this->m_laporan->lap_harian($tanggal, $bulan, $tahun);
		$no = 0;
		foreach ($pemesanan as $data) {
			$no++;
			$pdf->Cell(10, 6, $no, 1, 0, 'C');
			$pdf->Cell(40, 6, $data->name, 1, 0);
			$pdf->Cell(35, 6, $data->no_pesan, 1, 0);
			$pdf->Cell(30, 6, $data->tgl_order, 1, 0);
			$pdf->Cell(50, 6, $data->nama_paket, 1, 0);
			$pdf->Cell(30, 6, $data->harga, 1, 0);
			$pdf->Cell(30, 6, $data->diskon, 1, 0);
			$pdf->Cell(35, 6, $data->bayar, 1, 1);
		}
		$pdf->Output();
	}
}
