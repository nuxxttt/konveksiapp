<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonversiController extends Controller
{
    public function konversiSatuan(Request $request)
    {
        $input_unit = $request->input('input_unit');
        $jumlah_barang = (int)$request->input('jumlah_barang');
        $target_unit = $request->input('target_unit');

        $result = 0;

        if ($input_unit === 'lusin') {
            // Perform conversion based on the input unit to the target unit
            if ($target_unit === 'kodi') {
                $result = round($jumlah_barang * 12 / 20, 2);
            } elseif ($target_unit === 'gross') {
                $result = round($jumlah_barang * 12 / 144, 2);
            } else {
                $result = $jumlah_barang;
            }
        } elseif ($input_unit === 'kodi') {
            // Perform conversion based on the input unit to the target unit
            if ($target_unit === 'lusin') {
                $result = round($jumlah_barang * 20 / 12, 2);
            } elseif ($target_unit === 'gross') {
                $result = round($jumlah_barang * 20 / 144, 2);
            } else {
                $result = $jumlah_barang;
            }
        } elseif ($input_unit === 'gross') {
            // Perform conversion based on the input unit to the target unit
            if ($target_unit === 'lusin') {
                $result = round($jumlah_barang * 144 / 12, 2);
            } elseif ($target_unit === 'kodi') {
                $result = round($jumlah_barang * 144 / 20, 2);
            } else {
                $result = $jumlah_barang;
            }
        } else {
            $result = "satuan tidak ditemukan";
        }

        if (is_numeric($result)) {
            if ($result % 1 == 0) {
                $result = (int)$result;
            }
        } else {
            $target_unit = "";
        }

        return response()->json(['result' => $result . " " . $target_unit, 'dari' => $jumlah_barang . " ". $input_unit]);
    }

    }

