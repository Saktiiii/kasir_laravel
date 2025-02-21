<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi as ModelsTransaksi;
use App\Models\DetailTransaksi;
use App\Models\Produk;



class Transaksi extends Component
{
    public $kode, $total, $kembalian, $totalSemuaBelanja;
    public $bayar = 0;
    public $transaksiAktif, $transaksiId;

    public function transaksiBaru()
    {
        $this->reset();
        $this->transaksiAktif = new ModelsTransaksi();
        $this->transaksiAktif->kode = 'INV/' . date('YmdHis');
        $this->transaksiAktif->total = 0;
        $this->transaksiAktif->status = 'pending';
        $this->transaksiAktif->save();

        
    }

    public function hapusProduk($id){
        $detail = DetailTransaksi::find($id);
        if ($detail) {
            $produk = Produk::find($detail->produk_id);
            $produk->stok += $detail->jumlah;
            $produk->save();
        }
        $detail->delete();
    }
    public function updatedKode()
    {
        // Mencari produk berdasarkan kode yang dimasukkan
        $produk = Produk::where('kode', $this->kode)->first();

        // Pastikan produk ditemukan dan stoknya masih ada
        if ($produk && $produk->stok > 0) {
            // Pastikan transaksi aktif sudah ada
            if ($this->transaksiAktif) {
                // Menyimpan atau memperbarui detail transaksi
                $detail = DetailTransaksi::firstOrNew([
                    'transaksi_id' => $this->transaksiAktif->id, // Gunakan transaksi aktif yang sudah memiliki id
                    'produk_id' => $produk->id
                ], [
                    'jumlah' => 0 // Jika belum ada, atur jumlah ke 0
                ]);

                // Menambahkan jumlah produk
                $detail->jumlah += 1;
                $detail->save(); // Simpan perubahan detail transaksi

                //pengurangan stok
                $produk->stok -= 1;
                $produk->save();

                // Reset kode input produk
                $this->reset('kode');
            } else {
                // Tangani jika transaksi aktif belum ada
                session()->flash('error', 'Transaksi belum dimulai!');
            }
        } else {
            // Tangani jika produk tidak ditemukan atau stok habis
            session()->flash('error', 'Produk tidak ditemukan atau stok habis!');
        }
    }
    public function updatedBayar(){
        if ($this->bayar > 0) {
            $this->kembalian = $this->bayar - $this->totalSemuaBelanja;
        }
        
    }

    public function batalTransaksi()
    {
        if ($this->transaksiAktif) {
            $detailTransaksi = DetailTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            foreach ($detailTransaksi as $detail) {
                $produk = Produk::find($detail->produk_id);
                $produk->stok += $detail->jumlah;
                $produk->save();
                $detail->delete();
            }
            $this->transaksiAktif->delete();
        }
        $this->reset();
    }

    public function transaksiSelesai(){
        $this->transaksiAktif->total = $this->totalSemuaBelanja;
        $this->transaksiAktif->status = 'selesai';
        $this->transaksiAktif->save();
        $this->reset();
    }
    public function render()
    {
        if ($this->transaksiAktif) {
            $semuaProduk = DetailTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            $this->totalSemuaBelanja = $semuaProduk->sum(function ($detail){
                return $detail->produk->harga * $detail->jumlah;
            });
        } else {
            $semuaProduk = [];
        }
        return view('livewire.transaksi')->with([
            'semuaProduk' => $semuaProduk
        ]);
    }
}
