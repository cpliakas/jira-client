<?php

/**
 *
 */

namespace Jira\Request;


/**
 *
 */
class ProjectsRequest extends JiraRequest
{

    /**
     * Overrides JiraRequest:call().
     *
     * Returns all data as arrays of RemoteProject objects.
     */
    public function call($method)
    {
        $args = func_get_args();
        $data = call_user_func_array(array($this->_jiraClient, 'call'), $args);
        return $this->returnObjectArray($data, '\Jira\Remote\RemoteProject', 'key');
    }

    /**
     * Returns an array of all the Projects defined in JIRA.
     *
     * @return array
     *   An array of RemoteProject objects.
     *
     * @see https://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getProjectsNoSchemes(java.lang.String)
     */
    public function get()
    {
        return $this->call('getProjectsNoSchemes');
    }
}
