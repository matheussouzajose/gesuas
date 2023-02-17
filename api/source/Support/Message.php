<?php

namespace Source\Support;

class Message
{
    /** @var string */
    private string $text = '';

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function setText(string $message): Message
    {
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return string
     */
    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}