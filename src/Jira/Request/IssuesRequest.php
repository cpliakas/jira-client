<?php

/**
 *
 */

namespace Jira\Request;

/**
 *
 */
class IssuesRequest extends JiraRequest
{
    /**
     * Overrides JiraRequest:call().
     *
     * Returns all data as arrays of RemoteIssue objects.
     */
    public function call($method)
    {
        $args = func_get_args();
        $data = call_user_func_array(array($this->_jiraClient, 'call'), $args);
        return $this->returnObjectArray($data, '\Jira\Remote\RemoteIssue', 'key');
    }

    /**
     * Returns issues that match the saved filter specified by the filterId.
     *
     * @param int $filter_id
     *   The filter's unique identifier.
     * @param int $offset
     *   The zero-based offset of the first result, defaults to 0.
     * @param int $num_results
     *   The total number of issues to return.
     *
     * @return array
     *   An array of RemoteIssue objects.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssuesFromFilterWithLimit(java.lang.String, java.lang.String, int, int)
     */
    public function getFromFilter($filter_id, $offset = 0, $num_results = 50)
    {
        return $this->call('getIssuesFromFilterWithLimit', $filter_id, $offset, $num_results);
    }

    /**
     * Returns issues that match the JQL query.
     *
     * @param string $jql
     *   The JQL query used to return the results.
     * @param int $num_results
     *   The total number of issues to return.
     *
     * @return array
     *   An array of RemoteIssue objects.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssuesFromJqlSearch(java.lang.String, java.lang.String, int)
     */
    public function getFromJqlSearch($jql, $num_results = 50)
    {
        return $this->call('getIssuesFromJqlSearch', $jql, $num_results);
    }
}
