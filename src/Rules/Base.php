<?php

namespace Typograph\Rules;

use Typograph\Interfaces\RuleInterface;
use Typograph\Interfaces\TypographInterface;

/**
 * Базовый класс правила
 * @package Typograph\Rules
 */
abstract class Base implements RuleInterface
{
    /**
     * @var TypographInterface
     */
    protected TypographInterface $typograph;

    /**
     * Base constructor.
     * @param TypographInterface $typograph
     */
    public function __construct(TypographInterface $typograph)
    {
        $this->typograph = $typograph;
    }
}
