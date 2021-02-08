<?php

namespace App\Console\Commands;

use App\Models\IdeaSubscription;
use App\Models\Vote;
use Illuminate\Console\Command;

class FixMissingSubs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:subs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $votes = Vote::get();
        foreach( $votes as $vote ){
            $sub = new IdeaSubscription();
            $sub->idea_id = $vote->item_id;
            $sub->user_id = $vote->user_id;
            $sub->save();
        }

        return 0;
    }
}
