<?php

namespace App\Imports;

use App\Models\Rencana_Produksi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class RencanaProduksiImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)

    {
        return new Rencana_Produksi([
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]),
            'part_name' => $row[2],
            'channel' => $row[3],
            'qty_bar' => $row[4],
        ]);
    }
}
