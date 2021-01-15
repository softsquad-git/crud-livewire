<?php

namespace App\Repositories;

use App\Models\Tag;
use \Illuminate\Database\Eloquent\Collection;
use \Exception;

class TagsRepository
{
    /**
     * @return Tag[]|Collection
     */
    public function findAll()
    {
        return Tag::all();
    }

    /**
     * @param int $id
     * @return Tag|null
     * @throws Exception
     */
    public function find(int $id): ?Tag
    {
        $item = Tag::find($id);
        if ($item) {
            return $item;
        }

        throw new Exception('Taki element nie istnieje');
    }
}
/**TODO
 * 1 podpiąć edytor
 * 2 tagi przy edycji (uzupełnienie)
 */
