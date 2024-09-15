<?php

namespace App\Providers;

use App\Providers\LogUserActivity;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;


class UserActions
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\LogUserActivity  $event
     * @return void
     */
    public function handle(LogUserActivity $event)
    {
        //
        //$current_timestamp = Carbon::now()->toDateTimeString();
        $current_timestamp = now();
        $userInfo = $event->user;

        $saveActivity = DB::table('log_user_activity')->insert(
            [
                'name' => $userInfo->name,
                'email' => $userInfo->email,
                'action' => $event->action,
                'data' => $event->data,
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ]
        );
        return $saveActivity;
    }
}
