<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori'];

    public function getAllKategori()
    {
        return $this->findAll();
    }

    public function addKategori($data)
    {
        return $this->insert($data);
    }

    public function updateKategori($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteKategori($id)
    {
        return $this->delete($id);
    }
    public function getChartData()
    {
        return $this->select('kategori.nama_kategori, COUNT(produk.id_produk) as jumlah_produk')
        ->join('produk', 'produk.id_kategori = kategori.id_kategori', 'left')
        ->groupBy('kategori.nama_kategori')
        ->findAll();
    }
    public function countAllCategories()
    {
        return $this->countAllResults(false); // Hitung semua data tanpa mempengaruhi query builder
    }
}
