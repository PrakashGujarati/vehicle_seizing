<?php

namespace App\Console\Commands;

use App\CsvImport;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ProcessImportedCsvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command line file procesing command to process imported CSV file into the database';

    /**
     * CSV import collection object
     *
     * @var CsvImport
     */
    private $csv_import;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->processFileImport();
        $this->cleanUp();
        return 0;
    }

    private function processFileImport()
    {

        // Disable query log to conserve on memory
        DB::connection()->disableQueryLog();

        // Find first pending file import and eager load the csvRows
        $this->csv_import = CsvImport::where('status', 'pending')
            ->with('csvRows')
            ->first();

        if (!$this->csv_import) {
            printf("%s \n", "Nothing to process.");
            exit;
        }

        // Change the status of the import to avoid it being processed again.
        $this->csv_import->status = 'processing';
        $this->csv_import->save();

        if ($this->csv_import->fileImportContent !== null && count($this->csv_import->fileImportContent)) {
            // Get the header from the import
            $header = $this->csv_import->fileImportContent->first()->header;

            // Flip the values to keys and explode into array
            $header = array_flip(explode(',', $header));

            foreach ($this->csv_import->fileImportContent as $row) {
                // Convert the raw row data into array
                $row_array = explode(',', $row->content);

                // Build array of import properties
                $import_array = $header;

                // Match data array to the header array
                foreach ($import_array as $index => $key) {
                    $import_array[$index] = $row_array[$key];
                }

                /**
                 * Here we can perform additional validation
                 * for each data field and save it to the database
                 */

                // Build array of parameters for our user import
                $user = User::firstOrCreate([
                    'first_name' => $import_array['first_name'],
                    'last_name' => $import_array['last_name'],
                    'email' => $import_array['email']
                ]);
//                $movies = Movies::firstOrCreate([
//                    'user_id' => $user->id,
//                    'movie_list' => $import_array['movies']
//                ]);
//                $music = Music::firstOrCreate([
//                    'user_id' => $user->id,
//                    'music_list' => $import_array['music']
//                ]);
            }

            $this->csv_import->status = 'processed';
            $this->csv_import->save();

        } else {
            $this->csv_import->status = 'error';
            $this->csv_import->save();
            //Log error
            exit;
        }
    }

    private function cleanUp()
    {
        if ($this->csv_import->status === 'processed') {
            $this->csv_import->delete();
        }
    }
}
