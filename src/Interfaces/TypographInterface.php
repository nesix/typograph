<?php

namespace Typograph\Interfaces;

/**
 * Интерфейс типографа
 * @package Typograph\Interfaces
 */
interface TypographInterface
{
    /**
     * @param string|null $text
     * @return string|null
     */
    public function apply(?string $text): ?string;
}
