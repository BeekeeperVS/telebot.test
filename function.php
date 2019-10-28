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

function sendToTelegram()
{
    $url = "https://api.telegram.org/bot972581104:AAEZ-h072Dnnp_3_7fKtvQ293ti6KPHuUPo/sendMessage?";
    $params = [
        'chat_id' => "615668420",
        'parse_mode' => 'html',
        'text' => 'answer'
    ];
    file_get_contents($url.http_build_query($params));
}
