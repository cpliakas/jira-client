<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteProject.html
 */
class Project extends NamedEntity
{
    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var \Jira\Remote\Scheme|null
     */
    public $issueSecurityScheme;

    /**
     *
     * @var string
     */
    public $key;

    /**
     *
     * @var string
     */
    public $lead;

    /**
     *
     * @var \Jira\Remote\Scheme|null
     */
    public $notificationScheme;

    /**
     *
     * @var \Jira\Remote\PermissionScheme|null
     */
    public $permissionScheme;

    /**
     *
     * @var string
     */
    public $projectUrl;

    /**
     *
     * @var string
     */
    public $url;

    /**
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return \Jira\Remote\Scheme|null
     */
    public function getIssueSecurityScheme()
    {
        return $this->issueSecurityScheme;
    }

    /**
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     *
     * @return string
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     *
     * @return \Jira\Remote\Scheme
     */
    public function getNotificationScheme()
    {
        return $this->notificationScheme;
    }

    /**
     *
     */
    public function getPermissionScheme()
    {
        return $this->permissionScheme;
    }

    /**
     *
     * @return string
     */
    public function getProjectUrl()
    {
        return $this->projectUrl;
    }

    /**
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     *
     * @param string $description
     *
     * @return Jira\Remote\Project
     *
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @param \Jira\Remote\Scheme $scheme
     *
     * @return Jira\Remote\Project
     *
     */
    public function setIssueSecurityScheme(\Jira\Remote\Scheme $scheme)
    {
        $this->permissionScheme = $scheme;
        return $this;
    }

    /**
     *
     * @param string key
     *
     * @return Jira\Remote\Project
     *
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     *
     * @param string $lead
     *
     * @return Jira\Remote\Project
     *
     */
    public function setLead($lead)
    {
        $this->lead = $lead;
        return $this;
    }

    /**
     *
     * @param \Jira\Remote\Scheme $scheme
     *
     * @return Jira\Remote\Project
     *
     */
    public function setNotificationScheme(\Jira\Remote\Scheme $scheme)
    {
        $this->notificationScheme = $scheme;
        return $this;
    }

    /**
     *
     * @param \Jira\Remote\PermissionScheme $permission_scheme
     *
     * @return Jira\Remote\Project
     *
     */
    public function setPermissionScheme(\Jira\Remote\PermissionScheme $permission_scheme)
    {
        $this->permissionScheme = $permission_scheme;
        return $this;
    }

    /**
     *
     * @param string $url
     *
     * @return Jira\Remote\Project
     *
     */
    public function setProjectUrl($url)
    {
        $this->projectUrl = $url;
        return $this;
    }

    /**
     *
     * @param string $url
     *
     * @return Jira\Remote\Project
     *
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}
