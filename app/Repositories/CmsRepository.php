<?php

namespace App\Repositories;

use App\Models\Cms;
use \Illuminate\Database\Eloquent\Collection;
use \Exception;

class CmsRepository
{
    /**
     * @return Cms[]|Collection
     */
    public function findAll()
    {
        return Cms::all();
    }

    /**
     * @param int $id
     * @return Cms|null
     * @throws Exception
     */
    public function find(int $id): ?Cms
    {
        $item = Cms::find($id);
        if ($item) {
            return $item;
        }

        throw new Exception('Element nie istnieje');
    }
}
