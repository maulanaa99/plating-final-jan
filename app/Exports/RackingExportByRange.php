<?php

namespace App\Exports;

use App\Models\racking_t;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class RackingExportByRange implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $startDate = request()->input('startDate') ;
        $endDate   = request()->input('endDate') ;
        return racking_t::with('plating')
            ->whereBetween('tanggal_r', [ $startDate, $endDate ] )
            ->get();
    }

    public function map($racking) : array {
        return [
            $racking->id,
            $racking->user->email,
            $racking->user->key_num,
            $racking->user->plus_one,
            Carbon::parse($racking->event_date)->toFormattedDateString(),
            Carbon::parse($racking->created_at)->toFormattedDateString()
        ] ;
 
 
    }
}
