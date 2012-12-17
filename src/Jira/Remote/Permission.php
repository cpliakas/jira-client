<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemotePermission.html
 */
class Permission extends Object
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
     * @return \Jira\Remote\Permission
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
     * @return \Jira\Remote\Permission
     *
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
        return $this;
    }
}
