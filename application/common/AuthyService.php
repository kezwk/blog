<?php
namespace app\common;
use Authy\AuthyApi;

class AuthyService
{

    public static function newAuthyApi()
    {
        $api_key = "KmwnqfuDhv2Gz09yJySOPDL1lLagdI2N";
        $authy_api = new AuthyApi($api_key);
        return $authy_api;
    }

    public static function createUserAuthy($email, $tel, $countryCode = 86)
    {
        $authy_api = self::newAuthyApi();
        $user = $authy_api->registerUser($email, $tel, $countryCode);
        if ($user->ok()) {
            return $user->id();
        }
        var_dump($user->errors());
        return false;
    }

    public static function sendSMS($authy_id)
    {
        $authy_api = self::newAuthyApi();
        $sms = $authy_api->requestSms($authy_id, ['force' => false]);

        if ($sms->ok()) {
            return true;
        }
        return false;
    }

    public static function verifyToken($token, $authy_id)
    {
        $authy_api = self::newAuthyApi();
        $verification = $authy_api->verifyToken($authy_id, $token);

        if ($verification->ok()) {
            return true;
        }
        return false;
    }

    public static function removeUser($authy_id)
    {
        $authy_api = self::newAuthyApi();
        $deleted = $authy_api->deleteUser($authy_id);
        if ($deleted->ok()) {
            return true;
        }
        return false;
    }
}
