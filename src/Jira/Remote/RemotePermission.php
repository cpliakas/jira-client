<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemotePermission.html
 */
class RemotePermission extends RemoteObject
{
    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var int
     */
    public $permission;

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
     * @return string
     */
    public function getPermission()
    {
        return $this->permission = $permission;
    }

    /**
     *
     * @param string $name
     *
     * @return RemotePermission
     *
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @param string $permission
     *
     * @return RemotePermission
     *
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
        return $this;
    }
}
