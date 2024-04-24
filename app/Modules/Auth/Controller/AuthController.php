<?php declare(strict_types=1);

namespace App\Modules\Auth\Controller;

use App\Modules\Auth\Request\AuthRequest;
use App\Presenters\JsonPresenter;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function __construct(
        private JsonPresenter $presenter
    )
    {
    }

    public function __invoke(AuthRequest $request)
    {
        if(Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            $data =  [
                'token' => Auth::user()->createToken('auth-token')->plainTextToken
            ];
            return $this->presenter->present($data);
        }
        throw new AuthenticationException();
    }
}
