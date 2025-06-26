<?php

namespace qeep\DTO\Telegram\Message\Sent;

abstract class AbstractTelegramSendMessage
{
    public function __construct(
        private readonly int $chatId,
        private readonly string $botToken,
    ) {}

    public function getChatId(): int
    {
        return $this->chatId;
    }

    public function getBotToken(): string
    {
        return $this->botToken;
    }
}
