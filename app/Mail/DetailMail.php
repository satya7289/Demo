<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DetailMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name,$email,$pincode;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($name,$email,$pincode)
    {
        $this->name = $name;
        $this->email = $email;
        $this->pincode =$pincode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->view('email')
                    ->to($this->email)
                    ->subject('This is Test Mail From Demo.')
                    ->with([
                        'name'=>$this->name,
                        'email'=>$this->email,
                        'pincode'=>$this->pincode
                    ]);
    }
}
