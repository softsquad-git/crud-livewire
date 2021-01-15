<?php

namespace App\Http\Livewire;
use App\Http\Requests\TagRequest;
use App\Repositories\TagsRepository;
use App\Services\TagService;
use Livewire\Component;
use \Exception;

class Tag extends Component
{
    /**
     * @var bool $isCreate
     */
    public $isCreate = false;

    /**
     * @var bool $isEdit
     */
    public $isEdit = false;

    /**
     * @var string $name
     */
    public $name;

    /**
     * @var null $tagId
     */
    public $tagId = null;

    /**
     * @var TagsRepository $tagsRepository
     */
    private $tagsRepository;

    /**
     * @var TagService $tagService
     */
    private $tagService;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->tagsRepository = new TagsRepository();
        $this->tagService = new TagService();
    }

    public function render()
    {
        return view('livewire.tag', [
            'tags' => $this->tagsRepository->findAll()
        ]);
    }

    /**
     * @return bool
     */
    public function isCreate(): bool
    {
        if ($this->isCreate) {
            $this->resetInput();
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
        if ($this->isEdit) {
            $this->resetInput();
            return $this->isEdit = false;
        }

        $this->tagId = $id;
        $item = $this->tagsRepository->find($id);
        $this->name = $item->name;

        return $this->isEdit = true;
    }

    private function resetInput() {
        $this->name = '';
    }

    /**
     * @param TagRequest $request
     */
    public function store(TagRequest $request)
    {
        $data = $request->get('serverMemo')['data'];
        $this->tagService->save($data);

        $this->isCreate();
    }

    public function update(TagRequest $request, int $id = null)
    {
        $data = $request->get('serverMemo')['data'];
        $item = $this->tagsRepository->find($id);
        $this->tagService->save($data, $item);

        $this->isEdit();
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function delete(int $id)
    {
        $item = $this->tagsRepository->find($id);
        $this->tagService->delete($item);

        session()->flash('message', 'Tag został usunięty');
    }
}
