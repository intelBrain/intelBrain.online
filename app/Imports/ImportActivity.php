<?php

namespace App\Imports;

use App\Models\ActivityLog;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportActivity implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ActivityLog([
            //
        ]);
    }
}
