<?php

namespace App\Observers;

use App\User;

class UserObserver
{

	/** custom method
     * Listen to the User creating  event and create the token before the saving the user to the *db.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function creating(User $user)
    {
    	$user->api_token = bin2hex(openssl_random_pseudo_bytes(30));
    }

    /**
     * Listen to the User created event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}