<?php

namespace Jira\Remote;


/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteEntity.html
 */
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
