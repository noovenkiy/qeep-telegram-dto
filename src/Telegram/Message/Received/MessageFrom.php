<?php

namespace qeep\DTO\Telegram\Message\Received;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class MessageFrom
{
    #[JMS\Expose]
    #[JMS\Type('int')]
    private int $id;

    #[JMS\Expose]
    #[JMS\SerializedName('is_bot')]
    #[JMS\Type('bool')]
    private bool $isBot = false;

    #[JMS\Expose]
    #[JMS\SerializedName('first_name')]
    #[JMS\Type('string')]
    private string $firstName;

    #[JMS\Expose]
    #[JMS\SerializedName('language_code')]
    #[JMS\Type('string')]
    private string $languageCode = 'en';

    #[JMS\Expose]
    #[JMS\SerializedName('is_premium')]
    #[JMS\Type('bool')]
    private bool $isPremium = false;

    public function getId(): int
    {
        return $this->id;
    }

    public function isBot(): bool
    {
        return $this->isBot;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLanguageCode(): string
    {
        return $this->languageCode;
    }

    public function isPremium(): bool
    {
        return $this->isPremium;
    }
}
