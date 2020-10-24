<?php

namespace Dipenparmar12\ImportCsv\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CsvLoadFileCommand extends Command
{
    public $secure_file_priv_path;
    public $field_terminated_by;
    public $line_terminated_by;
    public $truncate;
    public $csv_dir;
    public $csv_ignore_lines;
    public $input_file_extension;
    public $csv_file;
    public $table_name;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:load:file 
                    {path : Csv file, absolute path}
                    {table : Table name}
                    {--field_terminated_by=, : Fields Terminated}
                    {--line_terminated_by=\r\n : Line Terminated}
                    {--truncate :  Truncate table before inserting new records.}
                    {--ignore_lines=1 : Ignore number of lines before import. (if we want to ignore csv headers)}
                    {--file_extension :  file_extension.}
                    { --force : Force the operation to run when database table not found, and skip file import }
    ';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import millions of record in few seconds with csv file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        DB::statement("set global local_infile = 1;");
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // dump($this->options());
        // dump($this->arguments());
        // dd($this);

        $this->field_terminated_by = $this->option('field_terminated_by') ?: config('csv_import.field_terminated_by');
        $this->line_terminated_by = $this->option('line_terminated_by') ?: config('csv_import.line_terminated_by');
        $this->truncate = $this->option('truncate') ?: config('csv_import.truncate');
        $this->csv_ignore_lines = $this->option('ignore_lines') ?: config('csv_import.ignore_lines');
        $this->input_file_extension = $this->option('file_extension') ?: config('csv_import.file_extension');
        $this->csv_file = $this->argument('path');
        $this->table_name = $this->argument("table");

        $imported_csv = [];
        $skipped_csv = [];

        if (Schema::hasTable($this->table_name)) {
            if ($this->truncate) {
                DB::table($this->table_name)->truncate();
            }

            DB::statement("set global local_infile = 1;");
            $import_query = sprintf(
                "
                    LOAD DATA LOCAL INFILE '%s' INTO TABLE `%s`
                        FIELDS TERMINATED BY '$this->field_terminated_by' 
                        ENCLOSED BY '\"' 
                        LINES TERMINATED BY '$this->line_terminated_by' IGNORE $this->csv_ignore_lines LINES            
                 ;",
                addslashes($this->csv_file),
                $this->table_name
            );

            $db = DB::connection()->getpdo();
            /*dump*/($db->exec($import_query));
            return 1;
        }

        $database = DB::connection()->getDatabaseName();
        $msg = "Table `$this->table_name` not found in `$database` Database";
        return 0;
    }

    public function get_table_name_from_file_name($path)
    {
        return basename($path, ".$this->input_file_extension");
    }

    public function get_csv_headings($path, $str = true)
    {
        $headings_array = @fgetcsv(fopen($path, 'rb'));
        if ($str) {
            return implode(',', $headings_array) ?? "";
        }

        return $headings_array;
    }

    public function __destruct()
    {
        DB::statement("set global local_infile = 0;");
    }
}

// DB::statement("update vehicles set created_at=now(), updated_at=now() where created_at=0 or created_at is null");