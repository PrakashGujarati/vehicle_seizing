<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CsvImportController extends Controller
{
    public function form()
    {
        return view("csv_import");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "csv_file" => [
                "required", "file", "max:100000",
                "mimes:csv,txt,text/csv,text/anytext,text/plain,csv,application/csv,application/excel,text,text/x-c,",
            ],
            "table_name" => "required|string|in:users,vehicles"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        if ($request->hasFile("csv_file")) {
            $file = $request->file('csv_file');
            $file_name = Str::uuid()->toString() . "_" . now()->format("d_M_Y_H_i") . ".csv";
            $csv_path = $file->move(storage_path("csv"), $file_name);
            Artisan::call('csv:load:file', [
                'path' => $csv_path,
                'table' => $request->get('table_name')
            ]);
            DB::table('vehicles')
                ->where('created_at', 0)->orWhereNull('created_at')->update(['created_at' => now()]);
            return redirect()->back()->with(["success" => "Data imported successfully."]);
        }

        return redirect()->back();
    }
}


//MySQL Incorrect datetime value: '0000-00-00 00:00:00'
//https://stackoverflow.com/questions/35565128/mysql-incorrect-datetime-value-0000-00-00-000000