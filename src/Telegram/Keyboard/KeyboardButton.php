<?php

namespace qeep\DTO\Telegram\Keyboard;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
readonly class KeyboardButton implements ButtonInterface
{
    #[JMS\Expose]
    private string $title;

    #[JMS\Expose]
    #[JMS\SerializedName('request_contact')]
    private ?bool $requestContact;

    #[JMS\Expose]
    #[JMS\SerializedName('request_location')]
    private ?bool $requestLocation;

    #[JMS\Expose]
    #[JMS\SerializedName('web_app')]
    private ?string $webAppUrl;

    public function __construct(
        string $title,
        ?bool $requestContact = null,
        ?bool $requestLocation = null,
        ?string $webAppUrl = null,
    ) {
        $this->title = $title;
        $this->requestContact = $requestContact;
        $this->requestLocation = $requestLocation;
        $this->webAppUrl = $webAppUrl;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getRequestContact(): ?bool
    {
        return $this->requestContact;
    }

    public function getRequestLocation(): ?bool
    {
        return $this->requestLocation;
    }

    public function getWebAppUrl(): ?string
    {
        return $this->webAppUrl;
    }
}
