<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dire
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'field_terminated_by' => env('CSV_FIELDS_TERMINATED_BY', ','),
    'line_terminated_by' => env('CSV_LINES_TERMINATED_BY', '\r\n'),
    'truncate' => env('CSV_TRUNCATE_TABLE', false),
    'ignore_lines' => env('CSV_IGNORE_LINES', 1),
    'file_extension' => env('CSV_EXTENSION', 'csv'),
    'csv_dir' => env('CSV_DIR', base_path() . '/database/csv_import'),
    'mysql_installation_path' => "/usr/bin/mysql",
];
