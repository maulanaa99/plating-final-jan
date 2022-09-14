<?php

namespace App\Exports;

use App\Models\Plating;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UnrackingExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Plating::all();
    }

    public function headings(): array
    {
        return ["id","No Part", "Part Name", "Katalis", "Channel", "Grade Color", "Qty Bar", "Cycle", "Tgl Racking", 
        "No. Bar", "Waktu in Racking", "Tgl Prod Molding", "Tgl Unracking", "Waktu in Unracking", "Qty Aktual"];
    }
}
