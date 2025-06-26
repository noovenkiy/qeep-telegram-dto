<?php

namespace qeep\Telegram\DTO\Keyboard;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class ButtonLine
{
    #[JMS\Expose]
    #[JMS\Type('array<App\DTO\Telegram\Keyboard\Button>')]
    private array $buttons = [];

    public function __construct(ButtonInterface ...$buttons)
    {
        foreach ($buttons as $button) {
            $this->addButton($button);
        }
    }

    public function addButton(ButtonInterface $button): self
    {
        $this->buttons[] = $button;

        return $this;
    }

    public function getButtons(): array
    {
        return $this->buttons;
    }

    public function setButtons(array $buttons): void
    {
        $this->buttons = $buttons;
    }

    public function toArray(): array
    {
        $buttonLine = [];
        foreach ($this->buttons as $button) {
            $buttonLine[] = $button->toArray();
        }

        return $buttonLine;
    }
}
