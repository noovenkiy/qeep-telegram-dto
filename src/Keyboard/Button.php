<?php

namespace qeep\Telegram\DTO\Keyboard;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class Button implements ButtonInterface
{
    #[JMS\Expose]
    private string $title;

    #[JMS\Expose]
    #[JMS\SerializedName('callback_data')]
    private string $callbackData;

    public function __construct(string $title, string $callbackData)
    {
        $this->title = $title;
        $this->callbackData = $callbackData;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCallbackData(): string
    {
        return $this->callbackData;
    }

    public function setCallbackData(string $callbackData): void
    {
        $this->callbackData = $callbackData;
    }
}
