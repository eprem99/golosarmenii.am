<?php

use Botble\Widget\AbstractWidget;

class SocialWidget extends AbstractWidget
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
    protected $widgetDirectory = 'social';

    /**
     * Widget constructor.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Social',
            'description' => __('Social widget.'),
            'telegram'     => null,
            'facebook'     => null,
            'vk'     => null,
            'twitter'     => null,
        ]);

    }

}