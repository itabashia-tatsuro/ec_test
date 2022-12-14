<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;
class Authenticate extends Middleware
{
    // RouteServiceProvider.phpで設定したprefix（as）をプロパティとして設定する
    protected $user_route = 'user.login';
    protected $admin_route = 'admin.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     * 認証されていない時、リダイレクトさせる処理を記述する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return route('login');
            
            // 渡されたURLで判別し、リダイレクト先を選別する
            // ログイン認証ユーザーを増やすときは、elseifで増やしていく
            if(Route::is('admin.*')) {
                return route($this->admin_route); // adminログインページへ
            }
            else {
                return route($this->user_route); // userログインページへ
            }
        }
    }
}
