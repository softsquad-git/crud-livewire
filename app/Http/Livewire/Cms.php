<?php

namespace App\Http\Livewire;

use App\Http\Requests\CmsRequest;
use App\Repositories\CmsRepository;
use App\Repositories\TagsRepository;
use App\Services\CmsService;
use Livewire\Component;
use \Exception;

class Cms extends Component
{
    /**
     * @var CmsRepository $repositoryCms
     */
    private $repositoryCms;

    /**
     * @var TagsRepository $repositoryTag
     */
    private $repositoryTag;

    /**
     * @var CmsService $serviceCms
     */
    private $serviceCms;

    /**
     * @var bool $isCreate
     */
    public $isCreate = false;

    /**
     * @var bool $isEdit
     */
    public $isEdit = false;

    /**
     * @var string $title
     */
    public $title;

    /**
     * @var string $description
     */
    public $description;

    /**
     * @var int $cmsId
     */
    public $cmsId;

    /**
     * @var array|null $tags
     */
    public $tags = [];

    /**
     * @var null|\App\Models\Cms $item
     */
    public $item;

    public $checkedTags;

    /**
     * @var string[] $rules
     */
    protected $rules = [
        'title' => 'required',
        'description' => 'required'
    ];

    /**

     * @param null $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->repositoryCms = new CmsRepository();
        $this->serviceCms = new CmsService();
        $this->repositoryTag = new TagsRepository();
    }

    public function render()
    {
        return view('livewire.cms', [
            'data' => $this->repositoryCms->findAll(),
            'allTags' => $this->repositoryTag->findAll()
        ]);
    }

    /**
     * @return bool
     */
    public function isCreate(): bool
    {
        $this->resetInput();
        if ($this->isCreate) {
            return $this->isCreate = false;
        }

        return $this->isCreate = true;
    }

    /**
     * @param int|null $id
     * @return bool
     * @throws Exception
     */
    public function isEdit(int $id = null): bool
    {
        $this->resetInput();
        if ($this->isEdit) {
            return $this->isEdit = false;
        }

        $item = $this->repositoryCms->find($id);
        $this->description = $item->description;
        $this->title = $item->title;
        $this->cmsId = $id;
        $tags = [];
        foreach ($item->tags as $tag) {
            $this->tags[$tag->tag_id] = $tag->tag_id;
        }

      //  dd($this->tags);

        return $this->isEdit = true;
    }

    private function resetInput()
    {
        $this->description = '';
        $this->title = '';
        $this->tags = [];
        $this->cmsId = '';
        $this->checkedTags = [];
    }

    /**
     * @param CmsRequest $request
     */
    public function store(CmsRequest $request)
    {
        $this->validate();
        $data = $request->get('serverMemo')['data'];
        $this->serviceCms->save($data);
        $this->isCreate();
    }

    /**
     * @param CmsRequest $request
     * @param int $id
     * @throws Exception
     */
    public function update(CmsRequest $request, int $id)
    {
        $this->validate();
        $data = $request->get('serverMemo')['data'];
        $item = $this->repositoryCms->find($id);
        $this->serviceCms->save($data, $item);

        $this->isEdit();
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function delete(int $id)
    {
        $item = $this->repositoryCms->find($id);
        $this->serviceCms->delete($item);

        session()->flash('message', 'Element został usunięty');
    }

    /**
     * @param int|null $id
     * @return \App\Models\Cms|null
     * @throws Exception
     */
    public function find(int $id = null): ?\App\Models\Cms
    {
        if ($this->item) {
            return $this->item = null;
        }

        $item = $this->repositoryCms->find($id);
        return $this->item = $item;
    }


}
