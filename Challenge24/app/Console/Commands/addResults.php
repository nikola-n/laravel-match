<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Match;
use Illuminate\Http\Request;

class addResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:result';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This function generates results';

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
        $matches = Match::all();
        foreach($matches as $match)
        {
            $num1 = rand(1,5);
            $num2 = rand(1,5);
            $match->result = "$num1 : $num2";
            $match->save();
        }
    }
}
