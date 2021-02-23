<?php

namespace Botble\Comments\Tables;

use BaseHelper;
use Botble\Comments\Exports\CommentsExport;
use Botble\Comments\Models\Comments;
use Html;
use Illuminate\Support\Facades\Auth;
use Botble\Comments\Enums\CommentsStatusEnum;
use Botble\Comments\Repositories\Interfaces\CommentsInterface;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class CommentsTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * @var string
     */
    protected $exportClass = CommentsExport::class;

   // protected $postRepository;

    /**
     * CommentsTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param CommentsInterface $commentsRepository
     */
    public function __construct(DataTables $table, 
    UrlGenerator $urlGenerator, 
    CommentsInterface $commentsRepository)
    {
        $this->repository = $commentsRepository;
        $this->setOption('id', 'table-comment');
        parent::__construct($table, $urlGenerator);
      //  $this->postRepository = $postRepository;
        if (!Auth::user()->hasAnyPermission(['comment.edit', 'comment.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                if (!Auth::user()->hasPermission('comment.edit')) {
                    return $item->name;
                }

                return Html::link(route('comment.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return $this->getOperations('comment.edit', 'comment.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $select = [
            'comment.id',
            'comment.post_id',
            'comment.name',
            'comment.email',
            'comment.created_at',
            'comment.status',
        ];

        $query = $model->select($select);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, $select));
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        return [
            'id'         => [
                'name'  => 'comment.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'post_id'         => [
                'name'  => 'comment.post_id',
                'title' => trans('core/base::tables.post_id'),
                'width' => '20px',
            ],
            'name'       => [
                'name'  => 'comment.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'email'      => [
                'name'  => 'comment.email',
                'title' => trans('plugins/comments::comments.tables.email'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'comment.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status'    => [
                'name'  => 'comment.status',
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }
    public function getPost(): array
    {
        return $this->postRepository->pluck('posts.name', 'categories.id');
    }
    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        return apply_filters(BASE_FILTER_TABLE_BUTTONS, [], Comments::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('comment.deletes'), 'comment.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'comment.post_id'       => [
                'title'    => trans('core/base::tables.post_id'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'comment.name'       => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'comment.email'      => [
                'title'    => trans('core/base::tables.email'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'comment.status'    => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => CommentsStatusEnum::labels(),
                'validate' => 'required|' . Rule::in(CommentsStatusEnum::values()),
            ],
            'comment.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultButtons(): array
    {
        return [
            'export',
            'reload',
        ];
    }
}
