<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function createIfNotExists($data) {
        Log::info($data);
        $user = User::where('chat_id', $data['message']['chat']['id'])->first();

        if(!$user) {
            $user = User::create([
                'chat_id' => $data['message']['chat']['id'],
                'first_name' => $data['message']['chat']['first_name'],
                'last_name' => isset($data['message']['chat']['last_name']) ? $data['message']['chat']['last_name'] : null,
                'language_code' => $data['message']['from']['language_code'],
                'username' => $data['message']['chat']['username']
            ]);
        }
        return $user;
    }

}