<?php

namespace Jira\Remote;

class Entity extends Object
{
    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @return string
     *
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param string $id
     *
     * @return \Jira\Remote\Entity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
