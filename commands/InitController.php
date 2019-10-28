<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\db\TelebotConfiguration;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class InitController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        print_r("----Start init----\n");


        $this->actionTelebotConfiguration();


        print_r("----End init----\n");
    }

    public function actionTelebotConfiguration()
    {

        print_r("----Start init Telebot Configuration----\n");

        $configurations = require __DIR__ . '/../components/init/telebotConfiguration.php';
        foreach ($configurations as $configuration) {
            $configurationModel = TelebotConfiguration::find()
                ->where(['type' => $configuration['type']])->one();
            if (!$configurationModel) {
                $configurationModel = new TelebotConfiguration();

                $configurationModel->type = $configuration['type'];
                $configurationModel->title = $configuration['title'];
                $configurationModel->value = $configuration['value'];
                $configurationModel->save();
            }


        }
    }
}
