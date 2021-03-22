<?php

use Botble\Widget\AbstractWidget;

class CurenciesWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var string
     */
    protected $frontendTemplate = 'frontend';

    /**
     * @var string
     */
    protected $backendTemplate = 'backend';

    /**
     * @var string
     */
    protected $widgetDirectory = 'curencies';

    /**
     * Widget constructor.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Curencies',
            'description' => __('Curencies widget.'),
            'content'     => null,
        ]);

    }

}