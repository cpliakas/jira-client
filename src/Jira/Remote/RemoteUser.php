<?php

/**
 *
 */

namespace Jira\Remote;

use Jira\JiraClient;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteUser.html
 */
class RemoteUser extends RemoteObject implements CreatableInterface
{
    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $fullname;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    protected $_password;

    /**
     * Implements CreatableInterface::create().
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#createUser(java.lang.String, java.lang.String, java.lang.String, java.lang.String, java.lang.String)
     */
    public function create(JiraClient $jira_client)
    {
        $data = $jira_client->call('createUser', $this->name, $this->_password, $this->fullname, $this->email);
        return new RemoteUser($data);
    }

    /**
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param string $email
     *
     * @return RemoteUser
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     *
     * @param string $fullname
     *
     * @return RemoteUser
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
        return $this;
    }

    /**
     *
     * @param string $name
     *
     * @return RemoteUser
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @param string $password
     *
     * @return RemoteUser
     */
    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }
}
