<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

    class CsvImport extends Model
{
    public $fillable = [
        'original_filename',
        'status',
        'row_count'
    ];

    protected $softDelete = false;

    public function csvRows()
    {
        return $this->hasMany(CsvRow::class, 'csv_import_id', 'id');
    }
}
