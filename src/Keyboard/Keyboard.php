<?php

namespace qeep\Telegram\DTO\Keyboard;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
abstract class Keyboard
{
    /**
     * @var ButtonLine[]
     */
    #[JMS\Expose]
    #[JMS\SerializedName('inline_keyboard')] // Это единственное отличие для inline клавиатуры
    #[JMS\Type('array<qeep\Telegram\DTO\Keyboard\ButtonLine>')]
    protected array $buttonLines = [];

    public function addLine(ButtonLine $buttonLine): self
    {
        $this->buttonLines[] = $buttonLine;

        return $this;
    }

    public function getButtonLines(): array
    {
        return $this->buttonLines;
    }

    public function setButtonLines(array $buttonLines): void
    {
        $this->buttonLines = $buttonLines;
    }

    public function getType(): string
    {
        return static::class;
    }

    public function getKeyboard(): array
    {
        $keyboard = [];
        foreach ($this->buttonLines as $buttonLine) {
            $keyboard[] = $buttonLine->toArray();
        }

        return $keyboard;
    }

    abstract public function toArray(): array;
}
