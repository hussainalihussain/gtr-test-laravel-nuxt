<?php

namespace App\Services;

use App\Models\ApiToken;

class ApiTokenService
{
    public function create()
    {
        $token = uniqid(time());
        ApiToken::create([
            'token' => $token
        ]);

        return $token;
    }

    public function verify(?string $token=null): bool
    {
        if (is_null($token)) {
            return false;
        }

        return !!ApiToken::where('token', $token)->first();
    }

    public function destroy(?string $token=null)
    {
        if (empty($token)) {
            return;
        }

        ApiToken::where('token', $token)->delete();
    }
}
