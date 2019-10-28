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
