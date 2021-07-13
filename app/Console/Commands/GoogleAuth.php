<?php

namespace App\Console\Commands;

use App\Helpers\GAuth;
use Google_Client;
use Google_Service_Calendar;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class GoogleAuth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'google:auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get access token from Google OAuth';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->GAuth = new GAuth;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = $this->GAuth->client;

        if($token = $this->GAuth->getToken()) {
            $client->setAccessToken($token);
        }

        if($client->isAccessTokenExpired()) {
            if($rToken = $client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($rToken);
            } else {
                $this->info("Open the following link in your browser: ");
                $this->comment($client->createAuthUrl());
                $code = $this->ask('Enter verification code: ');
                $accToken = $client->fetchAccessTokenWithAuthCode($code);
                $client->setAccessToken($accToken);

                if(array_key_exists('error', $accToken)) {
                    return $this->error('Google access token is invalid, try again');
                }
            }

            $this->GAuth->setTokenFile($client->getAccessToken());
        }

        $this->info('Google access token created successfully');
        return 0;
    }
}
