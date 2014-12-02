<?php

/**
 *
 */

namespace Jira\Request;

use Jira\Remote\RemoteUser;

/**
 *
 */
class UserRequest extends JiraRequest
{
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
