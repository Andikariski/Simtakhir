<?php
namespace App\Helpers;

use Exception;
use Google_Client;
use Google_Service_Calendar;

class GAuth
{
    public $client;

    private $tokenPath;

    public function __construct()
    {
        $this->tokenPath = base_path() . '/config/Gtoken.json';
        $this->client = $this->getClient();
    }

    public function setToken()
    {
        if($token = $this->getToken()) {
            $this->client->setAccessToken($token);
        }

        if($this->client->isAccessTokenExpired()) {
            if($rToken = $this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($rToken);
            } else {
                throw new Exception("You must run php artisan google:auth to generate the Google access token");
            }

            $this->setTokenFile($this->client->getAccessToken());
        }

        return true;
    }

    public function getToken()
    {
        if(file_exists($this->tokenPath)) {
            $content = file_get_contents($this->tokenPath);
            return json_decode($content, true);
        }

        return false;
    }

    public function setTokenFile(array $data)
    {
        file_put_contents($this->tokenPath, json_encode($data));
        return true;
    }

    private function getClient()
    {
        $client = new Google_Client([
            'application_name' => config('ggl.app_name'),
            'client_id' => config('ggl.client_id'),
            'client_secret' => config('ggl.client_secret'),
            'scopes' => [
                Google_Service_Calendar::CALENDAR,
                Google_Service_Calendar::CALENDAR_EVENTS,
            ],
            'redirect_uri' => config('ggl.redirect_uri'),
            'access_type' => 'offline',
            'prompt' => 'select_account consent'
        ]);

        return $client;
    }
}