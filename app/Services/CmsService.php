<?php

namespace App\Services;

use App\Models\Cms;
use App\Models\CmsTag;
use \Exception;

class CmsService
{
    /**
     * @param Cms $cms
     * @return bool|null
     * @throws Exception
     */
    public function delete(Cms $cms): ?bool
    {
        foreach (CmsTag::where('cms_id', $cms->id)->get() as $ct) {
            $ct->delete();
        }
        return $cms->delete();
    }

    /**
     * @param array $data
     * @param Cms|null $cms
     * @return Cms|null
     */
    public function save(array $data, Cms $cms = null): ?Cms
    {
        if ($cms) {
            $cms->update($data);
            $this->saveTags($data['tags'], $cms->id);

            return $cms;
        }

        $cms = Cms::create($data);
        if ($cms) {
            $this->saveTags($data['tags'], $cms->id);
        }

        return $cms;
    }

    private function saveTags(array $tags, int $cmsId)
    {
        foreach ($tags as $tag) {
            CmsTag::create([
                'cms_id' => $cmsId,
                'tag_id' => $tag
            ]);
        }
    }
}
