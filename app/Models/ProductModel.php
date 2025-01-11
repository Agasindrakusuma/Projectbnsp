<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['product', 'thumbnail', 'id_kategori', 'harga'];

    public function getProductsWithCategory($query = null)
    {
        $builder = $this->select('produk.*, kategori.nama_kategori')
        ->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');

        if ($query) {
            $builder->like('produk.product', $query, 'both');
        }

        return $builder->findAll();
    }

}
