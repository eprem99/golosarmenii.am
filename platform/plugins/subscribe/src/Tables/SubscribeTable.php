<?php

namespace Botble\Subscribe\Tables;

use BaseHelper;
use Botble\Subscribe\Exports\SubscribeExport;
use Botble\Subscribe\Models\Subscribe;
use Html;
use Illuminate\Support\Facades\Auth;
use Botble\Subscribe\Repositories\Interfaces\SubscribeInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class SubscribeTable extends TableAbstract
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
    protected $exportClass = SubscribeExport::class;

    /**
     * SubscribeTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param SubscribeInterface $subscribeRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, SubscribeInterface $subscribeRepository)
    {
        $this->repository = $subscribeRepository;
        $this->setOption('id', 'table-subscribe');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['subscribe.edit', 'subscribe.destroy'])) {
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
                if (!Auth::user()->hasPermission('subscribe.edit')) {
                    return $item->name;
                }

                return Html::link(route('subscribe.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return $this->getOperations('subscribe.edit', 'subscribe.destroy', $item);
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
            'subscribe.id',
            'subscribe.name',
            'subscribe.email',
            'subscribe.created_at',
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
                'name'  => 'subscribe.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name'       => [
                'name'  => 'subscribe.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'email'      => [
                'name'  => 'subscribe.email',
                'title' => trans('plugins/subscribe::subscribe.tables.email'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'subscribe.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        return apply_filters(BASE_FILTER_TABLE_BUTTONS, [], Subscribe::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('subscribe.deletes'), 'subscribe.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'subscribe.name'       => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'subscribe.email'      => [
                'title'    => trans('core/base::tables.email'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'subscribe.created_at' => [
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
