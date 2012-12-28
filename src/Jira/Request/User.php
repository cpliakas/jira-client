<?php

/**
 *
 */

namespace Jira\Request;

use Jira\Request;
use Jira\Remote\User as RemoteUser;

/**
 *
 */
class User extends Request
{
    /**
     * Creates a user.
     *
     * @param string $password
     *   The user's raw password.
     * @param string $fullname
     *   The full real name of the user.
     * @param string $email
     *   The user's email address.
     *
     * @return \Jira\Remote\User
     *   The updated user object.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#createUser(java.lang.String, java.lang.String, java.lang.String, java.lang.String, java.lang.String)
     */
    public function create($password, $fullname, $email)
    {
        $data = $this->call('createUser', $password, $fullname, $email);
        return new RemoteUser($data);
    }

    /**
     * Deletes the user.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#deleteUser(java.lang.String, java.lang.String)
     */
    public function delete()
    {
        return $this->call('deleteUser');
    }

    /**
     * Returns the remote user object for the specified user.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getUser(java.lang.String, java.lang.String)
     */
    public function get()
    {
        $data = $this->call('getUser');
        return new RemoteUser($data);
    }

}