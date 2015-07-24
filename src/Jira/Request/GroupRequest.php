<?php

/**
 * Currently only supports retrieving groups.
 */

namespace Jira\Request;

use Jira\Remote\RemoteGroup;

/**
 *
 */
class GroupRequest extends JiraRequest
{

    /**
     * Returns the remote user object for the specified user.
     *
     * @see https://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getGroup(java.lang.String, java.lang.String)
     */
    public function get()
    {
        $data = $this->call('getGroup');
        return new RemoteGroup($data);
    }

}
