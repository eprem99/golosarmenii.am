<?php

use Botble\Widget\AbstractWidget;

class WeatherWidget extends AbstractWidget
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
    protected $widgetDirectory = 'weather';

    /**
     * Widget constructor.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Weather - GolosArmenii Theme',
            'description' => __('Arbitrary weather.'),
            'cachetime'     => null,
            'geoid'     => null,
        ]);

    }


}