<?php
namespace Afrittella\ItalianCities\Console\Commands;

use Afrittella\ItalianCities\Models\ItalianRegion;
use Afrittella\ItalianCities\Models\ItalianState;
use Afrittella\ItalianCities\Models\ItalianCity;
use Afrittella\ItalianCities\Models\ItalianPostalCode;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class SeedCountries extends Command
{
    protected $signature = 'italian-cities:seed';

    protected $description = 'Seed regions, provinces, cities and postal codes (single sql files are in ./data folder)';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Seeding Countries tables. Please wait...');
        $files = [
            'reset' => '*',
            'regions' => ItalianRegion::class,
            'provinces' => ItalianState::class,
            'cities_1' => ItalianCity::class,
            'cities_2' => ItalianCity::class,
            'postal_codes_1' => ItalianPostalCode::class,
            'postal_codes_2' => ItalianPostalCode::class,
        ];
        
        

        DB::beginTransaction();        

        foreach ($files as $file => $model):        
            $path = __DIR__.'/../../../data/'.$file.'.sql';            
            if (file_exists($path)) {
                
                $this->info('Seeding '.$file.'...');
               
                $h = fopen($path, 'r');
                //$this->info(fread($h, filesize($path)));
                $content = fread($h, filesize($path));
                DB::unprepared($content);
                
                fclose($h);
            } else {
                DB::rollback();
                $this->error($file.' file not found');
                return;
            }
        endforeach;

        DB::commit();
        
    }
}