<?php

/**
 *
 */

namespace Jira\Request;

/**
 *
 */
class IssueTypesRequest extends JiraRequest
{
    /**
     * Overrides JiraRequest:call().
     *
     * Returns all data as arrays of RemoteIssueType objects.
     */
    public function call($method)
    {
        $args = func_get_args();
        $data = call_user_func_array(array($this->_jiraClient, 'call'), $args);
        return $this->returnObjectArray($data, '\Jira\Remote\RemoteIssueType', 'id');
    }

    /**
     * Returns an array of all the issue types for all projects in JIRA.
     *
     * @return array
     *   An array of RemoteIssueType objects.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssue(java.lang.String, java.lang.String)
     */
    public function get()
    {
        return $this->call('getIssueTypes');
    }

    /**
     * Returns an array of all the (non-sub task) issue types for the specified
     * project ID.
     *
     * @param string $project_id
     *   The ID of the project.
     *
     * @return array
     *   An array of RemoteIssueType objects.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssueTypesForProject(java.lang.String, java.lang.String)
     */
    public function getForProject($project_id)
    {
        return $this->call('getIssueTypesForProject', $project_id);
    }

    /**
     * Returns an array of all the sub task issue types in JIRA.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getSubTaskIssueTypes(java.lang.String)
     */
    public function getSubTaskTypes()
    {
        return $this->call('getSubTaskIssueTypes');
    }

    /**
     * Returns an array of all the sub task issue types for the specified project
     * ID.
     *
     * @param string $project_id
     *   The ID of the project.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssueTypesForProject(java.lang.String, java.lang.String)
     */
    public function getSubTaskTypesForProject($project_id)
    {
        return $this->call('getSubTaskIssueTypesForProject', $project_id);
    }
}
