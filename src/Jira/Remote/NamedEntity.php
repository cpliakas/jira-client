<?php

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteNamedEntity.html
 */
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
