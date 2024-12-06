<?php
namespace App\Rules;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use App\Models\Setting;
class ReCaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    $setting = Setting::find(1);

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::get("https://www.google.com/recaptcha/api/siteverify",[
            'secret' => $setting['recaptcha_secret_key'],
            'response' => $value
        ]);
  
        if (!($response->json()["success"] ?? false)) {
              $fail('The google recaptcha is required.');
        }
    }
}