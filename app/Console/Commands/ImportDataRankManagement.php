<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RankManagement;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ImportDataRankManagement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-data-rank-management';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file_path = resource_path('rank-management.csv');
        
        $spreadsheet = IOFactory::load($file_path);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();
        
        foreach($data as $key => $row) {
            if($key == 0) {
                continue;
            }
            RankManagement::create([
                'name' => $row[0],
                'rank' => $row[1],
            ]);
        }

        
    }
}
