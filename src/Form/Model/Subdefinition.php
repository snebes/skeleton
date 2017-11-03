<?php
/**
 * Created by PhpStorm.
 * User: snebes
 * Date: 11/1/17
 * Time: 1:35 PM
 */

namespace App\Form\Model;


class Subdefinition
{
    protected $label;
    protected $term;
    protected $definition;
    protected $extended;
    protected $subdefinitions = [];

    public function getLabel(): string
    {
        return $this->label ?? '';
    }

    public function setLabel(?string $value): self
    {
        $this->label = $value;

        return $this;
    }

    public function getTerm(): string
    {
        return $this->term ?? '';
    }

    public function setTerm(?string $value): self
    {
        $this->term = $value;

        return $this;
    }

    public function getDefinition(): string
    {
        return $this->definition ?? '';
    }

    public function setDefinition(?string $value): self
    {
        $this->definition = $value;

        return $this;
    }

    public function getExtendedDefinition(): string
    {
        return $this->extended ?? '';
    }

    public function setExtendedDefinition(?string $value): self
    {
        $this->extended = $value;

        return $this;
    }

    public function getSubdefinitions(): iterable
    {
        return $this->subdefinitions;
    }

    public function setSubdefinitions(iterable $value): self
    {
        $this->subdefinitions = $value;

        return $this;
    }

    public function __toString()
    {
        $str  = '<div class="sub_term">';
        $str .= sprintf('<p class="sub_term" %s>', '');
        $str .= sprintf('<span class="term">%s </span>', $this->term);
        $str .= sprintf('<span class="definition content_inline">%s</span>', $this->definition);
        $str .= '</p>';

        if (!empty($this->extended)) {
            $str .= $this->extended;
        }

        foreach ($this->getSubdefinitions() as $sub) {
            $str .= strval($sub);
        }

        $str .= '</div>';

        return $str;
    }
}