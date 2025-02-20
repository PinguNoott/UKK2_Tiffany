<?php
namespace App\Controllers;

use App\Models\M_oke;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function diskon()
    {
        $data = []; 
        if ($this->request->getMethod() === 'post') {
            $model = new M_oke();

            $harga = $this->request->getPost('harga');
            $diskon = $this->request->getPost('diskon');

         
            if ($harga <= 0 || $diskon < 0 || $diskon > 100) {
                $data['error'] = 'Input tidak valid! Harga harus lebih dari 0 dan diskon antara 0-100%.';
            } else {
                $nilai_diskon = ($harga * $diskon) / 100;
                $total_harga = $harga - $nilai_diskon;


                $model->simpanDiskon([
                    'harga' => $harga,
                    'diskon' => $diskon,
                    'total_harga' => $total_harga
                ]);

                $data['harga'] = $harga;
                $data['diskon'] = $diskon;
                $data['nilai_diskon'] = $nilai_diskon;
                $data['total_harga'] = $total_harga;
            }
        }

        return view('header')
            . view('menu')
            . view('diskon_view', $data)
            . view('footer');
    }
}
