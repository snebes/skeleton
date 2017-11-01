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
    protected $subdefinitions = [];
    protected $subdefinitionXml;

    public function getSubdefinitions(): iterable
    {
        return $this->subdefinitions;
    }

    public function setSubdefinitions(iterable $value): self
    {
        $this->subdefinitions = $value;

        return $this;
    }

    public function addSubdefinition(Subdefinition $value): self
    {
        $this->subdefinitions[] = $value;

        return $this;
    }

    public function removeSubdefinition(Subdefinition $value): self
    {
        $key = array_search($value, $this->subdefinitions, true);

        if (false !== $key) {
            unset($this->subdefinitions[$key]);
        }

        return $this;
    }
}
