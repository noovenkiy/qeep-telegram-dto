<?php

namespace qeep\Telegram\DTO\Message\Received;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class ReceivedData
{
    #[JMS\Expose]
    #[JMS\SerializedName('update_id')]
    #[JMS\Type('int')]
    private int $updateId;

    #[JMS\Expose]
    #[JMS\Type(ReceivedMessage::class)]
    private ?ReceivedMessage $message = null;

    #[JMS\Expose]
    #[JMS\SerializedName('callback_query')]
    #[JMS\Type(CallbackQuery::class)]
    private ?CallbackQuery $callbackQuery = null;

    public function getUpdateId(): int
    {
        return $this->updateId;
    }

    public function getMessage(): ?ReceivedMessage
    {
        return $this->message;
    }

    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callbackQuery;
    }

    public function isCallbackQuery(): bool
    {
        return $this->callbackQuery !== null;
    }

    public function isTextMessage(): bool
    {
        return $this->message !== null && $this->callbackQuery === null;
    }

    public function getChatId(): ?int
    {
        return $this->callbackQuery?->getMessage()?->getChat()?->getId()
            ?? $this->message?->getChat()->getId();
    }
}
