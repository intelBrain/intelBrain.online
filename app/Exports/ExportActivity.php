<?php

namespace App\Exports;

use App\Models\ActivityLog;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportActivity implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $from_date;
    protected $to_date;
    
        function __construct($from_date,$to_date) {
                $this->from_date = $from_date;
                $this->to_date = $to_date;
        }

    public function collection()
    {
        return ActivityLog::whereBetween('created_at',[$this->from_date,$this->to_date])->get();
    }
}
