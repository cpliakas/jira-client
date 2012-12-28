<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteProject.html
 */
class RemoteProject extends RemoteNamedEntity
{
    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var \Jira\Remote\RemoteScheme|null
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
     * @var \Jira\Remote\RemoteScheme|null
     */
    public $notificationScheme;

    /**
     *
     * @var \Jira\Remote\RemotePermissionScheme|null
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
     * Overrides \Jira\Remote\RemoteObject::objectMappings().
     */
    public function objectMappings()
    {
        return array(
            'issueSecurityScheme' => array(
                'classname' => '\Jira\Remote\RemoteScheme',
                'array' => false,
            ),
            'notificationScheme' => array(
                'classname' => '\Jira\Remote\RemoteScheme',
                'array' => false,
            ),
            'permissionScheme' => array(
                'classname' => '\Jira\Remote\RemotePermissionScheme',
                'array' => false,
            ),
        );
    }

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
     * @return \Jira\Remote\RemoteScheme|null
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
     * @return \Jira\Remote\RemoteScheme
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
     * @return Jira\Remote\RemoteProject
     *
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @param \Jira\Remote\RemoteScheme $scheme
     *
     * @return Jira\Remote\RemoteProject
     *
     */
    public function setIssueSecurityScheme(RemoteScheme $scheme)
    {
        $this->permissionScheme = $scheme;
        return $this;
    }

    /**
     *
     * @param string key
     *
     * @return Jira\Remote\RemoteProject
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
     * @return Jira\Remote\RemoteProject
     *
     */
    public function setLead($lead)
    {
        $this->lead = $lead;
        return $this;
    }

    /**
     *
     * @param \Jira\Remote\RemoteScheme $scheme
     *
     * @return Jira\Remote\RemoteProject
     *
     */
    public function setNotificationScheme(RemoteScheme $scheme)
    {
        $this->notificationScheme = $scheme;
        return $this;
    }

    /**
     *
     * @param \Jira\Remote\RemotePermissionScheme $permission_scheme
     *
     * @return Jira\Remote\RemoteProject
     *
     */
    public function setPermissionScheme(RemotePermissionScheme $permission_scheme)
    {
        $this->permissionScheme = $permission_scheme;
        return $this;
    }

    /**
     *
     * @param string $url
     *
     * @return Jira\Remote\RemoteProject
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
     * @return Jira\Remote\RemoteProject
     *
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}
