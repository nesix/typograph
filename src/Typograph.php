<?php

namespace Typograph;

use Typograph\Interfaces\RuleInterface;
use Typograph\Interfaces\TypographInterface;
use Typograph\Rules\Spaces;

/**
 * Типограф
 * @package Typograph
 */
class Typograph implements TypographInterface
{
    /**
     * @var RuleInterface[]
     */
    protected array $rules;

    /**
     * Typograph constructor.
     * @param RuleInterface[] $rules
     * @throws TypographErrorException
     */
    public function __construct(array $rules)
    {
        $this->rules = [];
        $ruleInterface = RuleInterface::class;
        foreach ($rules as $rule) {
            if (!is_a($rule, $ruleInterface, true)) {
                throw new TypographErrorException("Typograph rule '{$rule}' is not instance of {$ruleInterface}.");
            }
            $this->rules[] = new $rule($this);
        }
    }

    /**
     * @param string|null $text
     * @return string|null
     */
    public function apply(?string $text): ?string
    {
        foreach ($this->rules as $rule) {
            if (!$text) {
                break;
            }
            $text = $rule->apply($text);
        }
        return $text;
    }

    /**
     * @param string|null $text
     * @param RuleInterface[] $rules
     * @return string|null
     * @throws TypographErrorException
     */
    public static function fastApply(?string $text, array $rules = [ Spaces::class ]): ?string
    {
        return (new static($rules))->apply($text);
    }
}
