<?php

namespace App\Imports;

use App\Models\MasterData;
use Maatwebsite\Excel\Concerns\ToModel;

class MasterDataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MasterData([
            'no_part' => $row[1],
            'part_name' => $row[2],
            'katalis' => $row[3],
            'channel' => $row[4],
            'grade_color' => $row[5],
            'qty_bar' => $row[6],
            'stok' => $row[7],
            'qty_trolly' => $row[8],
            'bagian' => $row[9],
            'next_process' => $row[10],
            'model' => $row[11]
        ]);
    }
}
