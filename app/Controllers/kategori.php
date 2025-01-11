<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->getAllKategori();
        return view('kategori/index', $data);
        return view('kategori_chart');

    }

    public function add()
    {
        $kategoriModel = new KategoriModel();

        $namaKategori = $this->request->getPost('nama_kategori');
        if (!empty($namaKategori)) {
            $kategoriModel->addKategori(['nama_kategori' => $namaKategori]);
            return redirect()->to(base_url('kategori'))->with('success', 'Kategori berhasil ditambahkan!');
        }

        return redirect()->back()->with('error', 'Nama kategori tidak boleh kosong!');
    }

    public function edit($id)
    {
        $kategoriModel = new KategoriModel();

        $namaKategori = $this->request->getPost('nama_kategori');
        if (!empty($namaKategori)) {
            $kategoriModel->updateKategori($id, ['nama_kategori' => $namaKategori]);
            return redirect()->to(base_url('kategori'))->with('success', 'Kategori berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Nama kategori tidak boleh kosong!');
    }

    public function delete($id)
    {
        $kategoriModel = new KategoriModel();

        $kategoriModel->deleteKategori($id);
        return redirect()->to(base_url('kategori'))->with('success', 'Kategori berhasil dihapus!');
    }

    public function chartData()
    {
        $kategoriModel = new KategoriModel();

        // Ambil data grafik dari model
        $data = $kategoriModel->getChartData();

        // Return data dalam format JSON
        return $this->response->setJSON($data);
    }

    
}
