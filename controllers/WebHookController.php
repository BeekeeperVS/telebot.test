<?php


namespace app\controllers;


use app\models\db\TelebotChat;
use app\models\db\TelebotConfiguration;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;
use Yii;
use yii\web\Controller;
use yii\web\Response;

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

    /**
     * @var string
     */
    private $urlHook;

    /**
     * WebHookController constructor.
     * @param $id
     * @param $module
     * @param array $config
     */
    public function __construct($id, $module, $config = [])
    {

        parent::__construct($id, $module, $config);

        $this->bot_api_key = TelebotConfiguration::getValueByType('bot_api_key');
        $this->bot_username = TelebotConfiguration::getValueByType('username_bot');
        $this->urlHook = TelebotConfiguration::getValueByType('web_hook_url');

    }

    /**
     * Renders the index view for the module
     * @param $action
     * @return string
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action): string
    {
        // отключаем проверку csrf. проверка контролировала, что бы все запросы были от нашего сайта
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    public function actionHook()
    {

        $request = json_decode(file_get_contents('php://input'));
        $chat_id = $request->message->chat->id;
        $question = $request->message->text;
        $answerModel = TelebotChat::find()->where(['user_question' => $question])->one();

        if ($answerModel)
            $answer = $answerModel->bot_answer;
        else
            $answer = 'Я еще не знаю что Вам ответить!!!';

        $params = [
            'chat_id' => $chat_id,
            'text' => $answer
        ];

        sendToTelegram($this->bot_api_key, $params);

//        $commands_paths = [
//            __DIR__.'/../components/telegram/commands/',
//        ];
//
//        try {
//            // Create Telegram API object
//            $telegram = new Telegram($this->bot_api_key, $this->bot_username);
//            $telegram->sendMessage();
//            $telegram->addCommandsPaths($commands_paths);
//
//            // Handle telegram webhook request
//            $telegram->handle();
//
//        } catch (TelegramException $e) {
//
//        }
    }

    public function actionStatus()
    {
        Yii::$app->getResponse()->format = Response::FORMAT_JSON;

        $status = (integer)TelebotConfiguration::getValueByType('web_hook_status');

        if ($status) {
            if ($this->unset()) {
                TelebotConfiguration::updateValueByType('web_hook_status', TelebotConfiguration::STATSU_DISACTIVE);
                return ['status' => false];
            } else {
                return ['status' => true];
            }

        } else {
            if ($this->set()) {
                TelebotConfiguration::updateValueByType('web_hook_status', TelebotConfiguration::STATUS_ACTIVE);
                return ['status' => true];
            } else {
                return ['status' => false];
            }
        }

    }

    private function set()
    {
        try {
            // Create Telegram API object
            $telegram = new Telegram($this->bot_api_key, $this->bot_username);

            // Set webhook
            $result = $telegram->setWebhook($this->urlHook);
            if ($result->isOk()) {
                return true;
            } else {
                return false;
            }

        } catch (TelegramException $e) {
            return false;
        }
    }

    private function unset()
    {
        try {
            // Create Telegram API object
            $telegram = new Telegram($this->bot_api_key, $this->bot_username);
            // Delete webhook
            $result = $telegram->deleteWebhook();
            if ($result->isOk()) {
                return true;
            } else {
                return false;
            }
        } catch (TelegramException $e) {
            return false;
        }
    }
}