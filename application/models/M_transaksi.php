<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function simpan_keranjang($data)
    {
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->insert('keranjang', $data);
    }

    public function simpan_pesanan($data)
    {
        $this->db->insert('pemesanan', $data);
    }

    public function simpan_pembayaran($data_rinci)
    {
        $this->db->insert('pembayaran', $data_rinci);
    }
    public function update_keranjang()
    {
        $paket = $this->input->post('nama_paket');
        //$keranjang = implode(",", $paket);
        foreach ($paket as $key) {
            $data = array(
                'status' => '1'
            );
            $this->db->where(array(
                'id_paket' => $key
            ));
            $this->db->update('keranjang', $data);
        }
    }
    public function keranjang()
    {
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));

        $this->db->join('paket', 'keranjang.id_paket = paket.id_paket', 'left');
        $this->db->order_by('id_keranjang', 'desc');
        return $this->db->get()->result();
    }
    public function cekout()
    {
        $status = '1';
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status=', $status);
        $this->db->join('paket', 'keranjang.id_paket = paket.id_paket', 'left');
        $this->db->order_by('id_keranjang', 'desc');
        return $this->db->get()->result();
    }

    public function jml_keranjang()
    {
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get('keranjang')->num_rows();
    }

    public function hapus($data)
    {
        $this->db->where('id_keranjang', $data['id_keranjang']);
        $this->db->delete('keranjang');
    }

    public function jadwal_boking()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('pembayaran', 'pemesanan.no_pesan = pembayaran.no_pesan', 'left');
        $this->db->join('paket', 'pembayaran.id_paket = paket.id_paket', 'left');
        $this->db->where('status_pesan=0');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pesan=0');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pesan=1');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }

    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pesan=2');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pesan=3');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }

    public function batalpesan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pesan=4');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }

    public function detail_pesanan($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->get()->row();
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('id_pemesanan', $data['id_pemesanan']);
        $this->db->update('pemesanan', $data);
    }

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('rekening');
        return $this->db->get()->result();
    }

    public function pesanan_detail($no_pesan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('pembayaran', 'pemesanan.no_pesan = pembayaran.no_pesan', 'left');
        $this->db->join('paket', 'pembayaran.id_paket = paket.id_paket', 'left');
        $this->db->where('pemesanan.no_pesan', $no_pesan);
        return $this->db->get()->result();
    }

    public function riviews($no_pesan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('pembayaran', 'pemesanan.no_pesan = pembayaran.no_pesan', 'left');
        $this->db->join('paket', 'pembayaran.id_paket = paket.id_paket', 'left');
        $this->db->where('pemesanan.no_pesan', $no_pesan);
        return $this->db->get()->result();
    }

    public function insert_riview()
    {
        $data = array(
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'id_paket' => $this->input->post('id_paket'),
            'name' => $this->session->userdata('name'),
            'tanggal' => date('Y-m-d'),
            'riview' => $this->input->post('riview'),
        );
        $this->db->insert('testimoni', $data);
    }
}
