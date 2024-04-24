<?php declare(strict_types=1);

namespace App\Modules\User\Controller;

use App\Models\Category;
use App\Models\City;
use App\Models\Skill;
use App\Models\User;
use App\Modules\User\Request\UpdateRequest;
use App\Presenters\JsonPresenter;
use App\Services\DadataService;
use Illuminate\Support\Facades\Auth;

class UpdateController
{
    public function __construct(
        private User $user,
        private DadataService $dadataService,
        private JsonPresenter $presenter
    )
    {
    }

    public function __invoke(UpdateRequest $request)
    {
        $this->user = Auth::user();

        if(isset($request->fias_id)) {
            $city = City::where('fias_id','=',$request->fias_id)->first();
            if(!$city) {
                $response = $this->dadataService->findById($request->fias_id);
                $city = new City();
                $city->name = $response[0]['data']['city'];
                $city->fias_id = $request->fias_id;
                $city->save();
            }
            $this->user->city_id = $city->id;
            $this->user->save();
            unset($request->fias_id);
        }
        if(isset($request->categories)) {
            $categories = [];
            foreach ($request->categories as $category) {
                $categories[] = Category::firstOrCreate([
                    'title' => $category
                ])->id;
            }
            $this->user->categories()->sync($categories);
            unset($request->categories);
        }
        if(isset($request->skills)) {
            $skills = [];
            foreach ($request->skills as $skill) {
                $skills[] = Skill::firstOrCreate([
                    'title' => $skill
                ])->id;
            }
            $this->user->skills()->sync($skills);
            unset($request->skills);
        }
        if(isset($request->avatar)) {

            unset($request->avatar);
        }

        $this->user->update($request->all());

        return $this->presenter->present($this->user->toArray());
    }
}
