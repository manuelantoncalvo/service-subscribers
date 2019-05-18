<?php

namespace App\Console\Commands;

use App\Repositories\SubscribersRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;

class SubscribersReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscribers:report {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a report of Service subscribers.';

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
        try {
            $date = $this->getDate();
            $this->info("Generate subscription report for {$date->toDateString()}");
            $values = $this->getReportValues();

            foreach($values as $key=>$value)
            {
                $this->info("{$key}: {$value}");
            }

        }catch(Exception $e){
            $this->error("Invalid date: {$this->option('date')}. Please send date parameter with format YYYY-MM-DD");
        }
    }

    public function getReportValues()
    {
        return SubscribersRepository::getCommandReportFor($this->getDate());
    }

    public function getDate()
    {
        return Carbon::parse($this->option('date'));
    }
}
