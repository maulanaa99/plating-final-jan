<?php

namespace App\Exports;

use App\Models\MasterData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MasterDataExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MasterData::select('no_part', 'part_name', 'katalis', 'channel', 'grade_color', 'qty_bar', 'qty_trolly', 'bagian', 'next_process', 'model')->get();
    }

    public function headings(): array
    {
        return ['no part', 'part name', 'katalis', 'channel', 'grade color', 'qty bar', 'qty trolly', 'bagian', 'next process', 'model'];
    }
}
