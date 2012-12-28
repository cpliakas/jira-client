<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemotePermissionScheme.html
 */
class RemotePermissionScheme extends RemoteScheme
{
    /**
     * An array of RemotePermissionMapping objects.
     *
     * @var array
     */
     public $permissionMappings = array();

    /**
     * Overrides RemoteObject::objectMappings().
     */
    public function objectMappings()
    {
        return array(
            'permissionMappings' => array(
                'classname' => '\Jira\Remote\RemotePermissionMapping',
                'array' => true,
            ),
        );
    }

    /**
     *
     * @param RemotePermission $permission
     *
     * @param array $entities
     *   An array of RemoteEntity objects.
     *
     * @return RemotePermissionScheme
     */
    public function addPermissionMapping(RemotePermission $permission, array $entities)
    {
        $mapping = new RemotePermissionMapping();
        $mapping->setPermission($permission);
        $mapping->setRemoteEntities($entities);

        $name = $permission->getName($name);
        $this->permissionMappings[$name] = $mapping;

        return $this;
    }

    /**
     *
     * @return array
     *   An array of RemotePermissionMapping objects.
     */
    public function getPermissionMappings()
    {
        return $this->permissionMapping;
    }

    /**
     *
     * @param RemotePermissionMapping $mapping
     *
     * @return Jira\Remote\PermissionScheme
     */
    public function removePermissionMapping(RemotePermissionMapping $mapping)
    {
        $name = $mapping->getPermission()->getName();
        unset($this->permissionMappings[$name]);
        return $this;
    }

    /**
     *
     * @param array $mappings
     *   An array of RemotePermissionMapping objects.
     *
     * @return Jira\Remote\RemotePermissionScheme
     */
    public function setPermissionMappings(array $mappings)
    {
        $this->permissionMappings = array();
        foreach ($mappings as $mapping) {
            $name = $mapping->getPermission()->getName();
            $this->permissionMappings[$name] = $mapping;
        }
        return $this;
    }
}
