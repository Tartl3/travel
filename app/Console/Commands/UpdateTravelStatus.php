<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateTravelStatus extends Command
{
    protected $signature = 'update:travelstatus';

    protected $description = 'Update travel status based on date and time';

    public function __construct()
    {
        parent::__construct();
    }

    
}
