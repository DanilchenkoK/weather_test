<?php

namespace app\libs;

use DOMXPath;

class Weather
{

    private $url = "https://www.gismeteo.ua/weather-zaporizhia-5093/";

    public function getPage()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: multipart/form-data'
        ));
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 6);
        curl_setopt($ch, CURLOPT_TIMEOUT, 12);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            $error = 'Error:' . curl_error($ch);
            curl_close($ch);
            return  $error;
        }
        curl_close($ch);
        return $result;
    }

    private function getValues($divs)
    {
        $counter = 0;
        $weather = [];
        foreach ($divs as $div) {
            if ($div->getAttribute('class') === 'w_time') {
                $weather['time'][] = $div->childNodes->item(0)->textContent;
            }
            if ($div->getAttribute('class') === 'widget__value w_icon') {
                $weather['data_text'][] = $div->childNodes->item(0)->getAttribute('data-text');
            }
            if ($div->getAttribute('class') === 'value') {
                if ($counter++ >= 4) {
                    $weather['temperature'][] = $div->childNodes->item(0)->textContent;
                }
            }
            if ($counter == 12) break;
        }
        $weather['time_span'] = 8;
        return $weather;
    }

    public function getWeather()
    {
        $doc = new \DOMDocument();
        $html =  $this->getPage();
        @$doc->loadHTML($html);
        return $this->getValues($doc->getElementsByTagName('div'));
    }
}
