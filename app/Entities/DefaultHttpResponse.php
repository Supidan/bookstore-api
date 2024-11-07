<?php

namespace App\Entities;

class DefaultHttpResponse
{
    /**
     * @var int
     */
    private int $code = 0;
    /**
     * @var array
     */
    private array $content = [];

    /**
     * @param int $code
     * @param array $content
     */
    public function __construct(int $code, array $content)
    {
        $this->setCode($code);
        $this->setContent($content);
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * @param int $code
     * @return void
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @param array $content
     * @return void
     */
    public function setContent(array $content): void
    {
        $this->content = $content;
    }
}
