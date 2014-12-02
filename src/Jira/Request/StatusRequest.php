<?php

/**
 *
 */

namespace Jira\Request;

/**
 *
 */
class StatusRequest extends JiraRequest
{

    /**
     * Returns an array of all the issue types for all projects in JIRA.
     *
     * @return array
     *   An array of RemoteIssueType objects.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssue(java.lang.String, java.lang.String)
     */
    public function getStatuses()
    {
        $data = $this->call('getStatuses');
        return $this->returnObjectArray($data, '\Jira\Remote\RemoteStatus');
    }

}
