<?php

namespace App\Controllers;

use App\Models\M_oke;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function diskon()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new M_oke();

            $harga = $this->request->getPost('harga');
            $diskon = $this->request->getPost('diskon');

            // Validasi input
            if ($harga <= 0 || $diskon < 0 || $diskon > 100) {
                return view('diskon_view', [
                    'error' => 'Input tidak valid! Harga harus lebih dari 0 dan diskon antara 0-100%.'
                ]);
            }

            $nilai_diskon = ($harga * $diskon) / 100;
            $total_harga = $harga - $nilai_diskon;

            $model->simpanDiskon([
                'harga' => $harga,
                'diskon' => $diskon,
                'total_harga' => $total_harga
            ]);

            return view('diskon_view', [
                'harga' => $harga,
                'diskon' => $diskon,
                'nilai_diskon' => $nilai_diskon,
                'total_harga' => $total_harga
            ]);
        }

        return view('diskon_view');
    }
}


