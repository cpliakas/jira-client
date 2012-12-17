<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemotePermissionScheme.html
 */
class PermissionScheme extends Scheme
{
    /**
     * An array of \Jira\Remote\PermissionMapping objects.
     *
     * @var array
     */
     public $permissionMappings = array();

    /**
     *
     * @param \Jira\Remote\Permission $permission
     *
     * @param array $entities
     *   An array of \Jira\Remote\Entity objects.
     *
     * @return Jira\Remote\PermissionScheme
     */
    public function addPermissionMapping(Permission $permission, array $entities)
    {
        $mapping = new PermissionMapping();
        $mapping->setPermission($permission);
        $mapping->setRemoteEntities($entities);

        $name = $permission->getName($name);
        $this->permissionMappings[$name] = $mapping;

        return $this;
    }

    /**
     *
     * @return array
     *   An array of \Jira\Remote\PermissionMapping objects.
     */
    public function getPermissionMappings()
    {
        return $this->permissionMapping;
    }

    /**
     *
     * @param PermissionMapping $mapping
     *
     * @return Jira\Remote\PermissionScheme
     */
    public function removePermissionMapping(PermissionMapping $mapping)
    {
        $name = $mapping->getPermission()->getName();
        unset($this->permissionMappings[$name]);
        return $this;
    }

    /**
     *
     * @param array $mappings
     *   An array of \Jira\Remote\PermissionMapping objects.
     *
     * @return Jira\Remote\PermissionScheme
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
