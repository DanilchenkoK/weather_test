<?php
for ($i = 0; $i < $weather['time_span']; $i++) {
    echo $weather['time'][$i] . " " . $weather['data_text'][$i] . " " . $weather['temperature'][$i] . "<br>";
}
