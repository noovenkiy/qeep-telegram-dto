<?php

namespace qeep\DTO\Telegram\Keyboard;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class ReplyKeyboard extends Keyboard
{
    #[JMS\Expose]
    #[JMS\SerializedName('is_persistent')]
    private ?bool $isPersistent;

    #[JMS\Expose]
    #[JMS\SerializedName('resize_keyboard')]
    private ?bool $resizeKeyboard;

    #[JMS\Expose]
    #[JMS\SerializedName('remove_keyboard')]
    private ?bool $removeKeyboard;

    public function __construct(
        ?bool $isPersistent = null,
        ?bool $resizeKeyboard = null,
        ?bool $removeKeyboard = null,
    ) {
        $this->isPersistent = $isPersistent;
        $this->resizeKeyboard = $resizeKeyboard;
        $this->removeKeyboard = $removeKeyboard;
    }

    public function isPersistent(): ?bool
    {
        return $this->isPersistent;
    }

    public function isResizeKeyboard(): ?bool
    {
        return $this->resizeKeyboard;
    }

    public function isRemoveKeyboard(): ?bool
    {
        return $this->removeKeyboard;
    }
}
