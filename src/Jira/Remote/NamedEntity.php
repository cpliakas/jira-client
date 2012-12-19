<?php

namespace Jira\Remote;

class NamedEntity extends Entity
{
    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param string $name
     *
     * @return Jira\Remote\NamedEntity
     *
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
