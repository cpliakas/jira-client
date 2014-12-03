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
     * Returns an array of all the issue statuses in JIRA.
     *
     * @return array
     *   An array of RemoteStatus objects.
     *
     * @see https://docs.atlassian.com/software/jira/docs/api/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getStatuses(java.lang.String)
     */
    public function getStatuses()
    {
        $data = $this->call('getStatuses');
        return $this->returnObjectArray($data, '\Jira\Remote\RemoteStatus');
    }

}
