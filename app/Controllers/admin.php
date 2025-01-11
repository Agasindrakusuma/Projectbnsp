<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\KategoriModel;

class Admin extends BaseController
{
    public function index()
    {
        $produkModel = new ProductModel();
        $kategoriModel = new KategoriModel();

        $data['getproduk'] = $produkModel->getProductsWithCategory();
        $data['kategori'] = $kategoriModel->findAll();

        return view('admin', $data);
    }

    public function add()
    {
        $model = new ProductModel();

        $file = $this->request->getFile('thumbnail');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
        } else {
            return redirect()->back()->with('error', 'Gagal mengunggah file');
        }

        $data = [
            'thumbnail' => $fileName,
            'product' => $this->request->getPost('product'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga' => $this->request->getPost('harga'),
        ];

        $model->save($data);
        echo '<script>
                alert("Selamat! Berhasil Menambah Data Produk");
                window.location="' . base_url('admin') . '"
            </script>';

        
    }

    public function edit($id)
    {
        $model = new ProductModel();
        $file = $this->request->getFile('thumbnail');

        $updateData = [
            'product' => $this->request->getPost('product'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga' => $this->request->getPost('harga'),
        ];

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
            $updateData['thumbnail'] = $fileName;
        }

        $model->update($id, $updateData);
        echo '<script>
                alert("Selamat! Anda berhasil melakukan update data.");
                window.location="' . base_url('admin') . '"
            </script>';

    }

    public function delete($id)
    {
        $model = new ProductModel();
        $produk = $model->find($id);

        if ($produk && file_exists('uploads/' . $produk['thumbnail'])) {
            unlink('uploads/' . $produk['thumbnail']);
        }

        $model->delete($id);
        echo '<script>
                    alert("Selamat! Data berhasil terhapus.");
                    window.location="' . base_url('admin') . '"
                </script>';
                
       
    }

    public function search()
    {
        $query = $this->request->getPost('query');
        $produkModel = new ProductModel();

        $results = $produkModel->getProductsWithCategory($query);

        return view('admin', [
            'getproduk' => $results,
            'kategori' => (new KategoriModel())->findAll(),
            'query' => $query,
        ]);
    }

}
