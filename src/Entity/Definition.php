<?php
/**
 * Created by PhpStorm.
 * User: snebes
 * Date: 11/1/17
 * Time: 1:31 PM
 */

namespace App\Entity;

use App\Form\Model\Subdefinition;

/**
  */
class Definition
{
    protected $label;
    protected $term;
    protected $definition;
    protected $extended;
    protected $subdefinitions = [];
    protected $subdefinitionXml;

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

    public function getSubdefinitionXml(): string
    {
        return $this->subdefinitionXml ?? '';
    }

    public function setSubdefinitionXml(string $value): self
    {
        $this->subdefinitionXml = $value;

        return $this;
    }
}
