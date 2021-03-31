<?php

namespace Botble\Subscribe\Repositories\Eloquent;

use Botble\Subscribe\Repositories\Interfaces\SubscribeInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;

class SubscribeRepository extends RepositoriesAbstract implements SubscribeInterface
{
    /**
     * {@inheritDoc}
     */
    public function getUnread($select = ['*'])
    {
        $data = $this->model->where('id', '*')->select($select)->get();
        $this->resetModel();
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function countUnread()
    {
        $data = $this->model->where('id', '*')->count();
        $this->resetModel();
        return $data;
    }
}
