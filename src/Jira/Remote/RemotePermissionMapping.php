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
     * @var \Jira\Remote\RemotePermission
     *
     */
    public $permission;

    /**
     * An array of \Jira\Remote\RemoteEntity objects.
     *
     * @var array
     */
    public $entities = array();

    /**
     * Overrides \Jira\Remote\RemoteObject::objectMappings().
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
     * @return \Jira\Remote\RemotePermission
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     *
     * @return array
     *   An array of \Jira\Remote\RemoteEntity objects.
     */
    public function getRemoteEntities()
    {
        return $this->entities;
    }


    /**
     *
     * @param \Jira\Remote\RemotePermission $permission
     *
     * @return \Jira\Remote\RemotePermissionMapping
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
     *   An array of \Jira\Remote\RemoteEntity objects.
     *
     * @return \Jira\Remote\RemotePermissionMapping
     *
     */
    public function setRemoteEntities(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
}
