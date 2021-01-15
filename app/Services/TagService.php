<?php

namespace App\Services;

use App\Models\CmsTag;
use App\Models\Tag;
use \Exception;

class TagService
{
    /**
     * @param array $data
     * @param Tag|null $tag
     * @return Tag|null
     */
    public function save(array $data, Tag $tag = null): ?Tag
    {
        if ($tag) {
            $tag->update($data);

            return $tag;
        }

        return Tag::create($data);
    }

    /**
     * @param Tag $tag
     * @return bool|null
     * @throws Exception
     */
    public function delete(Tag $tag): ?bool
    {
        foreach (CmsTag::where('tag_id', $tag->id)->get() as $ct) {
            $ct->delete();
        }
        return $tag->delete();
    }
}
