<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Exception;

class GitHubController
{
    public function __invoke()
    {
        $url = 'https://github.com/login/oauth/access_token';
        $parameters = [
            'client_id' => getenv('OAUTH_GITHUB_CLIENT_ID'),
            'client_secret' => getenv('OAUTH_GITHUB_CLIENT_SECRET'),
            'redirect_uri' => getenv('OAUTH_GITHUB_REDIRECT_URI'),
            'code' => request()->input('code'),
        ];
        $url .= '?' . http_build_query($parameters);
        $response = Http::post($url);

        if (!$response->ok()) {
            throw new Exception('erorr');
        }

        $data = [];
        parse_str($response->body(), $data);

        if (!isset($data['access_token'])) {
            return redirect()->route('auth.login');
        }

        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . $data['access_token'],
        ])->get('https://api.github.com/user');

        $userInfo = $user->json();
        //dd($userInfo);
        if (empty($userInfo['email'])) {
            $url = 'https://api.github.com/user/emails';
            $emailInfo = Http::withToken($data['access_token'])->get($url);
//            dd($emailInfo->json());
            $userInfo['email'] = $emailInfo->json()[0]['email'];
        }

        if (!$this->createUser($userInfo)) {
            return redirect()->route('auth.login');
        }
        return redirect()->route('admin.panel');
    }

    /**
     * @param array $userInfo
     * @return bool
     */
    protected function createUser(array $userInfo): bool
    {
        $user = User::where('email', $userInfo['email'])->first();
        if (empty($user)) {
            //dd($userInfo);
            $user = User::create([
                'name' => empty($userInfo['name']) ? $userInfo['login'] : $userInfo['name'],
                'email' => $userInfo['email'],
                'access_level' => 'user',
                'password' => Hash::make($userInfo['id'] . '_' . $userInfo['node_id']),
            ]);
        }
        Auth::login($user);

        return true;
    }
}

