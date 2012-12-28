<?php

/**
 *
 */

namespace Jira\Request;

use Jira\Request;
use Jira\Remote\Avatar as RemoteAvatar;;
use Jira\Remote\PermissionScheme as RemotePermissionScheme;
use Jira\Remote\Project as RemoteProject;
use Jira\Remote\Scheme as RemoteScheme;
use Jira\Remote\Version as RemoteVersion;

/**
 *
 */
class Project extends Request
{
    /**
     * Adds a new version to the specified project.
     *
     * @param \Jira\Remote\Version $version
     *   The new version details.
     *
     * @return \Jira\Remote\Version
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addVersion(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteVersion)
     */
    public function addVersion(RemoteVersion $version)
    {
        $response = $this->call('addVersion', $version);
        return new RemoteVersion($response);
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
     * Creates a project.
     *
     * @param string $name
     *   The name of the new project.
     * @param string $description
     *   The description of the new project.
     * @param string $url
     *   The URL of the new project.
     * @param string $lead
     *   The username of the project lead.
     * @param \Jira\Remote\PermissionScheme|null $permission_scheme
     *   The permission scheme to use for the new project.
     * @param \Jira\Remote\Scheme|null $notification_scheme
     *   The notification scheme to use on the new project.
     * @param \Jira\Remote\Scheme|null $security_scheme
     *   The issue security scheme to use on the new project.
     *
     * @return \Jira\Remote\Project
     *
     * @see assian/jira/rpc/soap/JiraSoapService.html#createProject(java.lang.String, java.lang.String, java.lang.String, java.lang.String, java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemotePermissionScheme, com.atlassian.jira.rpc.soap.beans.RemoteScheme, com.atlassian.jira.rpc.soap.beans.RemoteScheme)
     */
    public function create($name, $description, $url, $lead, RemotePermissionScheme $permission_scheme = null, RemoteScheme $notification_scheme = null, RemoteScheme $security_scheme = null)
    {
        $data = $this->call('createProject', $name, $description, $url, $lead, $permission_scheme, $notification_scheme, $security_scheme);
        return new RemoteProject($data);
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
     * @return array
     *   An array of \Jira\Remote\Component objects.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getComponents(java.lang.String, java.lang.String)
     */
    public function getComponents()
    {
        $data = $this->call('getComponents');
        return $this->returnObjectArray($data, '\Jira\Remote\Component');
    }

    /**
     * Returns the fields that are shown during an issue creation for a project.
     *
     * @param int $type_id
     *   The ID of the issue type being created.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getFieldsForCreate(java.lang.String, java.lang.String, java.lang.Long)
     */
    public function getFieldsForCreate($type_id)
    {
        $data = $this->call('getFieldsForCreate', $type_id);
        return $this->returnObjectArray($data, '\Jira\Remote\Field');
    }

    /**
     * Retrieves the current avatar for the project.
     *
     * @return \Jira\Remote\Avatar
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getProjectAvatar(java.lang.String, java.lang.String)
     */
    public function getAvatar()
    {
        $data = $this->call('getProjectAvatar');
        return new RemoteAvatar($data);
    }

    /**
     * Retrieves the avatars for the project.
     *
     * @param bool $include_system_avatars
     *   If false, only custom avatars will be included in the returned array.
     *   Defaults to TRUE.
     *
     * @return array
     *   An array of \Jira\Remote\Avatar objects.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getProjectAvatars(java.lang.String, java.lang.String, boolean)
     */
    public function getAvatars($include_system_avatars = TRUE)
    {
        $data = $this->call('getProjectAvatars', $include_system_avatars);
        return $this->returnObjectArray($data, '\Jira\Remote\Avatar');
    }

    /**
     * Returns the Project details.
     *
     * @return \Jira\Remote\Project
     *   The project details.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getProjectByKey(java.lang.String, java.lang.String)
     */
    public function get()
    {
        $data = $this->call('getProjectByKey');
        return new RemoteProject($data);
    }

    /**
     * Returns an array of all the versions for the specified project key.
     *
     * @return array
     *   An array of \Jira\Remote\Version objects.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getVersions(java.lang.String, java.lang.String)
     */
    public function getVersions()
    {
        $data = $this->call('getVersions');
        return $this->returnObjectArray($data, '\Jira\Remote\Version');
    }

    /**
     * ??
     *
     * @param \Jira\Remote\Version $version
     *   The new version details.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#releaseVersion(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteVersion)
     */
    public function releaseVersion(RemoteVersion $version)
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