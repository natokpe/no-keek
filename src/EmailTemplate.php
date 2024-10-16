<?php
declare(strict_types = 1);

namespace NatOkpe\Wp\Theme\Keek;

class EmailTemplate
{
    private
    $_template = '';

    private
    $_isHtml = false;

    public
    function __construct(string $template, ?bool $isHtml)
    {
        $this->_template = $template;
        $this->_isHtml  = $isHtml ?? false;
    }

    public
    function template(): string
    {
        return $this->_template;
    }

    public
    function isHtml(): bool
    {
        return $this->_isHtml;
    }
}