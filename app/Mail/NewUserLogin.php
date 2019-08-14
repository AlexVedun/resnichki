<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserLogin extends Mailable
{
    use Queueable, SerializesModels;

    protected $login = '';
    protected $password = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_login, $_password)
    {
        $this->login = $_login;
        $this->password = $_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Добро пожаловать на сайт RESNICHKI!")->
            view('emails.new_user_login')->
            with(['login' => $this->login, 'password' => $this->password]);
    }
}
