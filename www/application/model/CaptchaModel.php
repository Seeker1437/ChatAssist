<?php

/**
 * Class CaptchaModel
 *
 * This model class handles all the captcha stuff.
 * Currently this uses the excellent Captcha generator lib from https://github.com/Gregwar/Captcha
 * Have a look there for more options etc.
 */
class CaptchaModel
{
	/**
	 * Generates the captcha, "returns" a real image, this is why there is header('Content-type: image/jpeg')
	 * Note: This is a very special method, as this is echoes out binary data.
	 */
	public static function generateAndShowCaptcha()
	{

	}

	/**
	 * Checks if the entered captcha is the same like the one from the rendered image which has been saved in session
	 * @param $captcha string The captcha characters
	 * @return bool success of captcha check
	 */
	public static function checkCaptcha($gRecaptchaResponse)
	{
        $recaptcha = new \ReCaptcha\ReCaptcha(Config::get('RECAPTCHA_SECRET'));
        $resp = $recaptcha->verify($gRecaptchaResponse, $_SERVER['REMOTE_ADDR']);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }
	}
}
