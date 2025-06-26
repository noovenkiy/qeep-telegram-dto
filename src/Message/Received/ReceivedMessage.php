<?php

namespace qeep\Telegram\DTO\Message\Received;

use DateTimeImmutable;
use DateTimeInterface;
use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class ReceivedMessage
{
    #[JMS\Expose]
    #[JMS\SerializedName('message_id')]
    #[JMS\Type('int')]
    private ?int $messageId = null;

    #[JMS\Expose]
    #[JMS\Type(MessageFrom::class)]
    private ?MessageFrom $from = null;

    #[JMS\Expose]
    #[JMS\Type(MessageChat::class)]
    private ?MessageChat $chat = null;

    #[JMS\Expose]
    #[JMS\Type('int')]
    #[JMS\SerializedName('date')]
    private ?int $date = null;

    #[JMS\Expose]
    #[JMS\Type('string')]
    private ?string $text = null;

    #[JMS\Expose]
    #[JMS\Type(ContactMessage::class)]
    private ?ContactMessage $contact = null;

    #[JMS\Expose]
    #[JMS\SerializedName('photo')]
    #[JMS\Type('array<App\DTO\Telegram\Message\Received\PhotoMessage>')]
    private ?array $photos = null;

    #[JMS\Expose]
    #[JMS\SerializedName('media_group_id')]
    #[JMS\Type('string')]
    private ?string $mediaGroupId = null;

    public function getMessageId(): ?int
    {
        return $this->messageId;
    }

    public function getFrom(): ?MessageFrom
    {
        return $this->from;
    }

    public function getChat(): ?MessageChat
    {
        return $this->chat;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function getDateAsDateTime(): ?DateTimeImmutable
    {
        return $this->date !== null
            ? DateTimeImmutable::createFromFormat('U', (string) $this->date)
            : null;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function getContact(): ?ContactMessage
    {
        return $this->contact;
    }

    public function hasContact(): bool
    {
        return $this->contact !== null;
    }

    public function hasText(): bool
    {
        return $this->text !== null;
    }

    public function hasPhotos(): bool
    {
        return !empty($this->photos);
    }

    /**
     * Возвращает фото с наилучшим качеством (последнее в массиве).
     */
    public function getBestPhoto(): ?PhotoMessage
    {
        if (empty($this->photos)) {
            return null;
        }
        $lastKey = array_key_last($this->photos);

        return $this->photos[$lastKey];
    }

    public function getMediaGroupId(): ?string
    {
        return $this->mediaGroupId;
    }

    public function isPartOfMediaGroup(): bool
    {
        return $this->mediaGroupId !== null;
    }
}
