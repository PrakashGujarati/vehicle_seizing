<?php

namespace App\Http\Controllers;

use App\Exports\VehicleBlankExport;
use App\Exports\VehicleExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function vehicleDownloadblank()
    {
        return Excel::download(new VehicleBlankExport, 'vehicle.xlsx');
    }

    public function vehicleExport()
    {
        return Excel::download(new VehicleExport, 'vehicle.xlsx');
    }

    public function export_vehicles(): void
    {
        $table = 'vehicles';
        $max = 10;
        $total = DB::table($table)->count();
        $pages = ceil($total / $max);
        for ($i = 1; $i < ($pages + 1); $i++) {
            $offset = (($i - 1) * $max);
            $start = ($offset == 0 ? 0 : ($offset + 1));
            $legacy = DB::table($table)->select("*")->skip($start)->take($max)->get();
            $file_name = Str::uuid()->toString();
            $file = database_path("$file_name.csv");
            if (!file_exists($file)) {
                touch($file);
            }
            foreach (json_decode(json_encode($legacy->toArray()), true) as $row) {
                $row_string = implode(',', $row);
                file_put_contents($file, $row_string . PHP_EOL, FILE_APPEND | LOCK_EX);
            }
        }
    }

}
