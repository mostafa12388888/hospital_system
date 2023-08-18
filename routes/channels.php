<?php

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {

    return (int) $user->id === (int) $id;
});
Broadcast::channel('createInvoice.{doctorId}', function ( $user, $doctorId) {

        return $user->id == $doctorId;
    },
    ['guards' => ['web','admin','doctor','rayemployee','laboratorEmploye','Patient']]
    );
Broadcast::channel('chatAbouteUs.{ReciveId}', function (Doctor $user, $ReciveId) {

        return $user->id == $ReciveId;
    },
    ['guards' => ['web','admin','doctor','rayemployee','laboratorEmploye','Patient']]);
Broadcast::channel('chatAbouteUs2.{ReciveId}', function (Patient $user, $ReciveId) {

        return $user->id == $ReciveId;
    },
    ['guards' => ['web','admin','doctor','rayemployee','laboratorEmploye','Patient']]);
