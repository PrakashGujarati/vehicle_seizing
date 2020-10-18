<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CsvImportController extends Controller
{
    public function form()
    {
        return view("csv_import");
    }

    public function store(Request $request)
    {
        $request->validate([
            "csv_file" => [
                "required", "file", "max:100000",
                "mimes:csv,txt,text/csv,text/anytext,text/plain,csv,application/csv,application/excel,text,text/x-c,",
            ],
            "table_name" => "required|string|in:users,vehicles"
        ]);

        if ($request->hasFile("csv_file")) {
            $file = $request->file('csv_file');
            $file_name = Str::uuid()->toString() . "_" . now()->format("d_M_Y_H_i") . ".csv";
            $csv_path = $file->move(storage_path("csv"), $file_name);
            Artisan::call('csv:load:file', [
                'path' => $csv_path,
                'table' => $request->get('table_name')
            ]);
            return redirect()->back()->with(["success" => "Data imported successfully."]);
        }

        return redirect()->back();
    }
}

