<?php

/**
 *
 */

namespace Jira\Request;

/**
 *
 */
class Project
{

    /**
     *
     * @var string
     */
    protected $_projectKey;

    /**
     *
     * @var \Jira\Client
     */
    protected $_client;

    /**
     *
     */
    public function __construct(\Jira\Client $client, $project_key)
    {
        $this->_client = $client;
        $this->_projectKey = $project_key;
    }

    /**
     * Wrapper around \Jira\Client::call() that adds the project key as the
     * second argument of the RPC call.
     *
     * @param string $method
     *   The method being invoked.
     * @param ...
     *   All additional arguments after the authentication token and issue key
     *   passed as the parameters to the RPC call.
     *
     * @return mixed
     *   The data returned by the RPC call.
     */
    public function call($method) {
        $args = func_get_args();
        $args[0] = $this->_projectKey;
        array_unshift($args, $method);
        return call_user_func_array(array($this->_client, 'call'), $args);
    }

    /**
     * Adds a new version to the specified project.
     *
     * @param \Jira\Object\Version $version
     *   The new version details.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addVersion(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteVersion)
     */
    public function addVersion(\Jira\Object\Version $version)
    {
        return $this->call('addVersion', $version);
    }

    /**
     * (Un)archives a version of a project.
     *
     * @param string $name
     *   The name of the version.
     * @param boolean $archive
     *   Whether to archive / unarchive the version.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#archiveVersion(java.lang.String, java.lang.String, java.lang.String, boolean)
     */
    public function archiveVersion($name, $archive)
    {
        return $this->call('archiveVersion', $name, $archive);
    }

    /**
     * Deletes the project.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#deleteProject(java.lang.String, java.lang.String)
     */
    public function delete()
    {
        return $this->call('deleteProject');
    }

    /**
     * Returns an array of all the components for the project.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getComponents(java.lang.String, java.lang.String)
     */
    public function getComponents()
    {
        return $this->call('getComponents');
    }

    /**
     * Returns the fields that are shown during an issue creation for a project.
     *
     * @param int $type_id
     *   The issue to update.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getFieldsForCreate(java.lang.String, java.lang.String, java.lang.Long)
     */
    public function getFieldsForCreate($type_id)
    {
        return $this->call('getFieldsForCreate', $type_id);
    }

    /**
     * Retrieves the current avatar for the project.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getProjectAvatar(java.lang.String, java.lang.String)
     */
    public function getAvatar()
    {
        return $this->call('getProjectAvatar');
    }

    /**
     * Retrieves the avatars for the project.
     *
     * @param bool $include_system_avatars
     *   If false, only custom avatars will be included in the returned array.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getProjectAvatars(java.lang.String, java.lang.String, boolean)
     */
    public function getAvatars($include_system_avatars)
    {
        return $this->call('getProjectAvatars', $include_system_avatars);
    }

    /**
     * Returns the Project details.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getProjectByKey(java.lang.String, java.lang.String)
     */
    public function get()
    {
        return $this->call('getProjectByKey');
    }

    /**
     * Returns an array of all the versions for the specified project key.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getVersions(java.lang.String, java.lang.String)
     */
    public function getVersions()
    {
        return $this->call('getVersions');
    }

    /**
     * ??
     *
     * @param \Jira\Object\Version $version
     *   The new version details.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#releaseVersion(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteVersion)
     */
    public function releaseVersion(\Jira\Object\Version $version)
    {
        return $this->call('releaseVersion', $version);
    }

    /**
     * Creates a new custom avatar for the project and sets it as the current
     * avatar.
     *
     * @param string $mime_type
     *   The MIME type of the image provided, e.g. "image/gif", "image/jpeg",
     *   "image/png".
     * @param string $imagedata
     *   A base 64 encoded image, 48 pixels square.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#setNewProjectAvatar(java.lang.String, java.lang.String, java.lang.String, java.lang.String)
     */
    public function setNewAvatar($mime_type, $imagedata)
    {
        return $this->call('setNewProjectAvatar', $mime_type, $imagedata);
    }

    /**
     * Sets the current avatar for the project to that with the given ID.
     *
     * @param int $avatar_id
     *   The avatar's ID.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#setProjectAvatar(java.lang.String, java.lang.String, java.lang.Long)
     */
    public function setAvatar($avatar_id)
    {
        return $this->call('setProjectAvatar', $avatar_id);
    }
}