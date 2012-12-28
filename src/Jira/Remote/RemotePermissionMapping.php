<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemotePermissionMapping.html
 */
class RemotePermissionMapping extends RemoteObject
{
    /**
     *
     * @var RemotePermission
     *
     */
    public $permission;

    /**
     * An array of RemoteEntity objects.
     *
     * @var array
     */
    public $entities = array();

    /**
     * Overrides RemoteObject::objectMappings().
     */
    public function objectMappings()
    {
        return array(
            'permission' => array(
                'classname' => '\Jira\Remote\RemotePermission',
                'array' => false,
            ),
            'entities' => array(
                'classname' => '\Jira\Remote\RemoteEntity',
                'array' => true,
            ),
        );
    }

    /**
     *
     * @return RemotePermission
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     *
     * @return array
     *   An array of RemoteEntity objects.
     */
    public function getRemoteEntities()
    {
        return $this->entities;
    }


    /**
     *
     * @param RemotePermission $permission
     *
     * @return RemotePermissionMapping
     *
     */
    public function setPermission(RemotePermission $permission)
    {
        $this->permission = $permission;
        return $this;
    }

    /**
     *
     * @param array $entities
     *   An array of RemoteEntity objects.
     *
     * @return RemotePermissionMapping
     *
     */
    public function setRemoteEntities(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
}
