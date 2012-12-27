<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemotePermissionMapping.html
 */
class PermissionMapping extends Object
{
    /**
     *
     * @var \Jira\Remote\Permission
     *
     */
    public $permission;

    /**
     * An array of \Jira\Remote\Entity objects.
     *
     * @var array
     */
    public $entities = array();

    /**
     * Overrides \Jira\Remote\Object::objectMappings().
     */
    public function objectMappings()
    {
        return array(
            'permission' => array(
                'classname' => '\Jira\Remote\Permission',
                'array' => false,
            ),
            'entities' => array(
                'classname' => '\Jira\Remote\Entity',
                'array' => true,
            ),
        );
    }

    /**
     *
     * @return \Jira\Remote\Permission
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     *
     * @return array
     *   An array of \Jira\Remote\Entity objects.
     */
    public function getRemoteEntities()
    {
        return $this->entities;
    }


    /**
     *
     * @param \Jira\Remote\Permission $permission
     *
     * @return \Jira\Remote\PermissionMapping
     *
     */
    public function setPermission(Permission $permission)
    {
        $this->permission = $permission;
        return $this;
    }

    /**
     *
     * @param array $entities
     *   An array of \Jira\Remote\Entity objects.
     *
     * @return \Jira\Remote\PermissionMapping
     *
     */
    public function setRemoteEntities(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
}
