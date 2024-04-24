<?php declare(strict_types=1);

namespace App\Modules\User\Controller;

use App\Presenters\JsonPresenter;
use Illuminate\Support\Facades\Auth;

class ShowController
{
    public function __construct(
        private JsonPresenter $presenter
    )
    {
    }

    public function __invoke()
    {
        $data = Auth::user()->toArray();
        return $this->presenter->present($data);
    }
}
