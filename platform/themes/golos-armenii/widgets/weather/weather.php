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
            'content'     => null,
        ]);

    }
    public function loriweather(){
        header("Access-Control-Allow-Origin: *");
        setlocale(LC_ALL, "ru_RU");
        date_default_timezone_set("Asia/Yerevan");
        
        $opts = array(
          'http' => array(
            'method' => "GET",
            'header' => "X-Yandex-API-Key: d5560353-00ee-4e04-b6a5-3af926315720"
          )
        );
        
        $url = "https://api.weather.yandex.ru/v1/forecast?lat=40.932145&lon=44.446378&limit=1&hours=false&extra=false";
        $context = stream_context_create($opts);
        $contents = file_get_contents($url, false, $context);
        $clima = json_decode($contents);
        
        //var_dump($clima);
        
        // $time_unix = $clima->fact->obs_time;
         $temp = $clima->yesterday->temp;
        // $humidity = $clima->fact->humidity;
        // $speed = $clima->fact->wind_speed;
        // $pressure = $clima->fact->pressure_mm;
        // $icon = $clima->fact->icon . ".svg";
        
        // $today = date("j/m/Y, H:i");
        // $time = date("j/m/Y, H:i", $time_unix);
        
        // echo "Дата/Вреемя:" . " - " . $today . "<br>";
        // echo "Обновлено:" . " - " . $time . "<br>";
         echo $temp;
        // echo "Влажность: " . $humidity . " %<br>";
        // echo "Ветер: " . $speed . " м/с<br>";
        // echo "Давление: " . $pressure . " мм р/с<br>";
        // echo "<img src='https://yastatic.net/weather/i/icons/blueye/color/svg/" . $icon . "'/ width='50'>";
        // $weather = loriweather();
    }

}