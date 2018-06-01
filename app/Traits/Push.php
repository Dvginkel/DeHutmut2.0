<?php

namespace App\Traits;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

trait Push
{
    public function sendPush($usertoken, $username, $productName)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('De Hutmut');
        $notificationBuilder->setBody('Beste '.$username.', Je hebt de loting op '.$productName.' gewonnen')
                            ->setSound('default')
                            ->setIcon('/storage/store/teddy-bear.png')
                            ->setBadge('/storage/store/teddy-bear.png')
                            ->setClickAction('https://dev.dehutmut.nl/account/');


        //dd($notificationBuilder);
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        #$token = $usertoken;

        $downstreamResponse = FCM::sendTo($usertoken, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        //return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

        //return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

        //return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

        // return Array (key:token, value:errror) - in production you should remove from yo
    }

    public function anotherMethod()
    {
        echo "Trait – anotherMethod() executed";
    }
}
