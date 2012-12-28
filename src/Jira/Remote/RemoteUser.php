<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteUser.html
 */
class RemoteUser extends RemoteObject
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
     * @return \Jira\Remote\RemoteUser
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
     * @return \Jira\Remote\RemoteUser
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
     * @return \Jira\Remote\RemoteUser
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
