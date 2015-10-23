<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DOMDocument;
use App\Domain;

class PullTopSites extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pullsites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull the top 500 global sites from Alexa into the database.';

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
     * @return mixed
     */
    public function handle()
    {
        Domain::truncate();
        for($i = 0; $i < 20; $i ++){
            $url = 'http://www.alexa.com/topsites/global;'.$i;
            $source = file_get_contents($url);
            $needle = '<div class="count">';
            $rankLists = explode($needle,$source);
            
            foreach($rankLists as $l){
                $extractInfo = explode('<', $l);
                $extractName = explode('</a', $extractInfo[4]);
                $extractSiteName = explode('>',array_pop($extractName));
                $extractSiteName = array_pop($extractSiteName);
                if(empty($extractSiteName) || empty($extractInfo[0]) ){
                    $extractSiteName = "unknown name";
                }else{
                    $domain = new Domain;
                    $domain->name = strtolower($extractSiteName);
                    $domain->rank = $extractInfo[0];
                    $domain->save();
                }
            }
        }
    }
}
