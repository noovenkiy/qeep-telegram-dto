<?php

namespace qeep\Telegram\DTO\Message\Received;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class CallbackQuery
{
    #[JMS\Expose]
    private string $id;

    #[JMS\Expose]
    #[JMS\Type(MessageFrom::class)]
    private MessageFrom $from;

    #[JMS\Expose]
    #[JMS\Type(CallbackMessage::class)]
    private CallbackMessage $message;

    #[JMS\Expose]
    #[JMS\SerializedName('chat_instance')]
    private string $chatInstance;

    #[JMS\Expose]
    private string $data;

    public function getId(): string
    {
        return $this->id;
    }

    public function getFrom(): MessageFrom
    {
        return $this->from;
    }

    public function getMessage(): CallbackMessage
    {
        return $this->message;
    }

    public function getChatInstance(): string
    {
        return $this->chatInstance;
    }

    public function getData(): string
    {
        return $this->data;
    }
}
