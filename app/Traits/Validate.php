<?php

namespace App\Traits;

use Mail;
use App\Detail;
use App\Mail\DetailMail;
use Illuminate\Support\Facades\Log;

trait Validate
{
    /**
     * name function return name pattern to be accepted
     */
    public function name()
    {
        return 'required|max:30';
    }

    /**
     * email function return email pattern to be accepted
     */
    public function email()
    {
        return array(
            'required',
            "regex:/^[a-zA-Z0-9.!'*+_`{|}~-]+@([a-zA-Z])+\.[c][o][m]+$/u",
        );
    }

    /**
     * pincode return pincode pattern to be accepted
     */
    public function pincode()
    {
        return 'required|max:999999|min:100000|numeric';
    }

    /**
     * checkDataSave return instance of detail ,two messages
     * and status in which case it falls in.
     */
    public function checkDataSave($name,$email,$pincode)
    {
        $detail          = new Detail();
        $detail->name    = $name;
        $detail->email   = $email;
        $detail->pinCode = $pincode;
        $message = '';
        $mailMessage ='';
        $status = 0;
        if(Detail::where('name', $detail->name)->first())
        {
            $status=1;
            $message = 'Name Aready exits.';
        }

        elseif (Detail::where('email', $detail->email)->first())
        {
            $status =2;
            $message = 'Email Already exits.';
        }

        elseif (Detail::where('pinCode', $detail->pinCode)->first())
        {
            $status=3;
            $message = 'Pincode Aready exits.';
        }

        else{
            $status=4;
            Mail::send(new DetailMail($detail->name,$detail->email,$detail->pinCode));
            if(Mail::failures()){
                $mailMessage = 'EMAIL_SENT_FAILED';
                Log::info($mailMessage);
            }
            else{
                $mailMessage = 'EMAIL_SENT';
                Log::info($mailMessage);
            }
            $detail->save();
            $message = 'Successfully Detail Added '.$mailMessage;
        }
        return array($detail,$message,$mailMessage,$status);
    }
}
