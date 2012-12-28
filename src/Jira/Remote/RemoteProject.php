<?php

/**
 *
 */

namespace Jira\Remote;

use Jira\JiraClient;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteProject.html
 */
class RemoteProject extends RemoteNamedEntity implements CreatableInterface
{
    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var RemoteScheme|null
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
     * @var RemoteScheme|null
     */
    public $notificationScheme;

    /**
     *
     * @var RemotePermissionScheme|null
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
     * Implements CreatableInterface::create().
     *
     * @see assian/jira/rpc/soap/JiraSoapService.html#createProject(java.lang.String, java.lang.String, java.lang.String, java.lang.String, java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemotePermissionScheme, com.atlassian.jira.rpc.soap.beans.RemoteScheme, com.atlassian.jira.rpc.soap.beans.RemoteScheme)
     */
    public function create(JiraClient $jira_client)
    {
        $data = $jira_client->call('createProject', $this->key, $this->name, $this->description, $this->url, $this->lead, $this->permissionScheme, $this->notificationScheme, $this->issueSecurityScheme);
        return new RemoteProject($data);
    }

    /**
     * Overrides RemoteObject::objectMappings().
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
     * @return RemoteScheme|null
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
     * @return RemoteScheme
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
     * @return RemoteProject
     *
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @param RemoteScheme $scheme
     *
     * @return RemoteProject
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
     * @return RemoteProject
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
     * @return RemoteProject
     *
     */
    public function setLead($lead)
    {
        $this->lead = $lead;
        return $this;
    }

    /**
     *
     * @param RemoteScheme $scheme
     *
     * @return RemoteProject
     *
     */
    public function setNotificationScheme(RemoteScheme $scheme)
    {
        $this->notificationScheme = $scheme;
        return $this;
    }

    /**
     *
     * @param RemotePermissionScheme $permission_scheme
     *
     * @return RemoteProject
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
     * @return RemoteProject
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
     * @return RemoteProject
     *
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}
