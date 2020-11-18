<?php

namespace Typograph\Interfaces;

/**
 * Интерфейс правила
 * @package Typograph
 */
interface RuleInterface
{
    /**
     * @param TypographInterface $typograph
     */
    public function __construct(TypographInterface $typograph);

    /**
     * @param string $text
     * @return string
     */
    public function apply(string $text): string;
}
