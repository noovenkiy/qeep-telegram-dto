<?php

namespace qeep\Telegram\DTO\Message\Received;

use DateTimeImmutable;
use DateTimeInterface;
use JMS\Serializer\Annotation as JMS;
use qeep\Telegram\DTO\Keyboard\InlineKeyboard;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class CallbackMessage
{
    #[JMS\Expose]
    #[JMS\SerializedName('message_id')]
    private int $messageId;

    #[JMS\Expose]
    #[JMS\Type(MessageFrom::class)]
    private MessageFrom $from;

    #[JMS\Expose]
    #[JMS\Type(MessageChat::class)]
    private MessageChat $chat;

    #[JMS\Expose]
    #[JMS\Type('int')]
    private int $date;

    #[JMS\Expose]
    private string $text;

    #[JMS\Expose]
    #[JMS\SerializedName('edit_date')]
    #[JMS\Type('int')]
    private ?int $editDate = null;

    #[JMS\Exclude]
    private ?array $entities = null;

    #[JMS\Expose]
    #[JMS\SerializedName('reply_markup')]
    #[JMS\Type(InlineKeyboard::class)]
    private ?InlineKeyboard $replyMarkup = null;

    public function getReplyMarkup(): ?InlineKeyboard
    {
        return $this->replyMarkup;
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function getFrom(): MessageFrom
    {
        return $this->from;
    }

    public function getChat(): MessageChat
    {
        return $this->chat;
    }

    public function getDate(): DateTimeInterface
    {
        return DateTimeImmutable::createFromFormat('U', (string) $this->date);
    }

    public function getEditDate(): ?DateTimeInterface
    {
        return $this->editDate
            ? DateTimeImmutable::createFromFormat('U', (string) $this->editDate)
            : null;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getEntities(): ?array
    {
        return $this->entities;
    }
}
