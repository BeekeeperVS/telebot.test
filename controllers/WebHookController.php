<?php


namespace app\controllers;


use app\models\db\TelebotConfiguration;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;
use yii\web\Controller;

class WebHookController extends Controller
{
    /**
     * @var string
     */
    private $bot_api_key;

    /**
     * @var string
     */
    private $bot_username;

    private $urlHook = 'http://test7.bortnichenko.tcl.ukrtech.info/web-hook/hook';


    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->bot_api_key = (TelebotConfiguration::find()->select(['value'])->where(['type' => 'bot_api_key'])->column())[0];
        $this->bot_username = (TelebotConfiguration::find()->select(['value'])->where(['type' => 'username_bot'])->column())[0];
    }

    public function actionHook()
    {
        $commands_paths = [
            __DIR__ . '/components/telegram/commands/',
        ];

        try {
            // Create Telegram API object
            $telegram = new Telegram($this->bot_api_key, $this->bot_username);

            $telegram->addCommandsPaths($commands_paths);

            // Handle telegram webhook request
            $telegram->handle();

        } catch (TelegramException $e) {

        }
    }

    public function actionSet()
    {

        try {
            // Create Telegram API object
            $telegram = new Telegram($this->bot_api_key, $this->bot_username);

            // Set webhook
            $result = $telegram->setWebhook($this->urlHook);
            if ($result->isOk()) {
                echo $result->getDescription();
            }
        } catch (TelegramException $e) {
            // log telegram errors
            // echo $e->getMessage();
        }
    }

    public function actionUnset()
    {
        try {
            // Create Telegram API object
            $telegram = new Telegram($this->bot_api_key, $this->bot_username);
            // Delete webhook
            $result = $telegram->deleteWebhook();
            if ($result->isOk()) {
                echo $result->getDescription();
            }
        } catch (TelegramException $e) {
            echo $e->getMessage();
        }
    }
}