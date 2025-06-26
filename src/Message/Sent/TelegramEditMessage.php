<?php

namespace qeep\Telegram\DTO\Message\Sent;

use qeep\Telegram\DTO\Keyboard\Keyboard;

class TelegramEditMessage extends AbstractTelegramSendMessage
{
    public function __construct(
        int $chatId,
        private readonly int $messageId,
        private readonly string $text,
        string $botToken,
        private readonly ?Keyboard $keyboard = null,
    ) {
        parent::__construct($chatId, $botToken);
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getKeyboard(): ?Keyboard
    {
        return $this->keyboard;
    }
}
