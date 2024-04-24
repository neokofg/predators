<?php declare(strict_types=1);

namespace App\Modules\User\Controller;

use App\Models\User;
use App\Modules\User\Request\IndexRequest;

class IndexController
{
    public function __construct(
        private mixed $users = null,
    )
    {

    }
    public function __invoke(IndexRequest $request)
    {
        $this->users = User::query();

        if(isset($request->category_id)) {
            $this->users = $this->users->whereRelation('categories','id','=',$request->category_id);
        }

        if(isset($request->skills)) {
            $this->users = $this->users->whereHas('skills', function ($q) use($request){
                $q->whereIn('id',$request->skills);
            });
        }

        $this->users = $this->users->paginate($request->first, page: $request->page ?? 1);
        $this->users = $this->users->appends([
            'first' => $request->first
        ]);

        return $this->users;
    }
}
