<?php

namespace qeep\Telegram\DTO\Keyboard;

class InlineKeyboard extends Keyboard
{
    public function toArray(): array
    {
        return ['inline_keyboard' => $this->getKeyboard()];
    }
}
