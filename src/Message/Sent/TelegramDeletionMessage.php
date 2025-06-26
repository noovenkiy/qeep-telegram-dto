<?php

namespace qeep\Telegram\DTO\Message\Sent;

class TelegramDeletionMessage extends AbstractTelegramSendMessage
{
    private int $messageId;

    public function __construct(
        int $chatId,
        int $messageId,
        string $botToken,
    ) {
        $this->messageId = $messageId;
        parent::__construct($chatId, $botToken);
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }
}
