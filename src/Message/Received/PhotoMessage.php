<?php

namespace qeep\Telegram\DTO\Message\Received;

use JMS\Serializer\Annotation as JMS;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class PhotoMessage
{
    #[JMS\Expose]
    #[JMS\SerializedName('file_id')]
    private string $fileId;

    #[JMS\Expose]
    #[JMS\SerializedName('file_unique_id')]
    private string $fileUniqueId;

    #[JMS\Expose]
    private int $width;

    #[JMS\Expose]
    private int $height;

    #[JMS\Expose]
    #[JMS\SerializedName('file_size')]
    private ?int $fileSize = null;

    public function getFileId(): string
    {
        return $this->fileId;
    }

    public function getFileUniqueId(): string
    {
        return $this->fileUniqueId;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }
}
