<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    public function getKategoriChartData()
    {
        $kategoriModel = new KategoriModel();
        $data = $kategoriModel->select('nama_kategori, COUNT(products.id) as jumlah_produk')
            ->join('products', 'products.kategori_id = kategori.id_kategori', 'left')
            ->groupBy('kategori.id_kategori')
            ->findAll();

        return $this->response->setJSON($data);
    }
}
