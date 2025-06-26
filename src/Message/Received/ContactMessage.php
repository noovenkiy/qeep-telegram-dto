<?php

namespace qeep\Telegram\DTO\Message\Received;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class ContactMessage
{
    #[JMS\Expose]
    #[JMS\SerializedName('phone_number')]
    #[JMS\Type('string')]
    private string $phoneNumber;

    #[JMS\Expose]
    #[JMS\SerializedName('first_name')]
    #[JMS\Type('string')]
    private string $firstName;

    #[JMS\Expose]
    #[JMS\SerializedName('last_name')]
    #[JMS\Type('string')]
    private ?string $lastName = null;

    #[JMS\Expose]
    #[JMS\SerializedName('user_id')]
    #[JMS\Type('int')]
    private ?int $userId = null;

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }
}
