<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsvRow extends Model
{
    protected $softDelete = false;

    public $fillable = [
        'csv_import_id',
        'header',
        'content'
    ];

    public function csvImport()
    {
        $this->belongsTo(CsvImport::class,'csv_import_id','id');
    }
}
