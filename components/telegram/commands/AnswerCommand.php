<?php


namespace app\commands\telegram\commands;

use app\models\db\TelebotChat;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;

/**
 * User "/echo" command
 *
 * Simply echo the input back to the user.
 */
class AnswerCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'answer';
    /**
     * @var string
     */
    protected $description = 'Answer user question';
    /**
     * @var string
     */
    protected $usage;
    /**
     * @var string
     */
    protected $version = '1.1.0';

    /**
     * Command execute method
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();
        $text = trim($message->getText(true));
        $this->setUsage($text);
        if ($text === '') {
            $text = $this->getUsage();
        }
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
        ];
        return Request::sendMessage($data);
    }

    /**
     * @param string $question
     * @return mixed
     */
    private function setUsage(string $question)
    {
        $modelAnswer = TelebotChat::find()->where(['user_question' => $question])->one();

        return $modelAnswer->bot_answer;
    }
}