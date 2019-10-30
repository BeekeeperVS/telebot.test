<?php

/**
 * @param string $world
 * @return string
 */
function translate(string $world)
{
//    return Yii::t('translate', $world);
    return $world;
}

/**
 * @param array $array
 * @return array
 */
function translateArray(array $array): array
{
    $resultArray = [];
    foreach ($array as $key => $value) {
        $resultArray[$key] = Yii::t('translate', $value);
    }
    return $resultArray;
}

function sendToTelegram(string $token, array $params = [])
{
    $url = "https://api.telegram.org/bot{$token}/sendMessage?";
    file_get_contents($url . http_build_query(array_merge(['parse_mode' => 'html'], $params)));
}
