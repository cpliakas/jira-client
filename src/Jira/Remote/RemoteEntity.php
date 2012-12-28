<?php

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteEntity.html
 */
class RemoteEntity extends RemoteObject
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
     * @return RemoteEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
