<?php declare(strict_types=1);

namespace App\Services;

use Dadata\DadataClient;
use http\Env;

class DadataService
{
    private DadataClient $dadata;
    public function __construct()
    {
        $this->dadata = new DadataClient(env('DADATA_API_KEY'), env('DADATA_SECREY_KEY'));
    }

    public function findById(string $id):array
    {
        return $this->dadata->findById("address", $id, 1);
    }
}
