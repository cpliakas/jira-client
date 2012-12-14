<?php

/**
 *
 */

namespace Jira\Request;

/**
 *
 */
class IssueTypes
{

  /**
   *
   */
  protected $_client;

  /**
   *
   */
  public function __construct(\Jira\Client $client)
  {
      $this->_client = $client;
  }

  /**
   * Returns an array of all the issue types for all projects in JIRA.
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssue(java.lang.String, java.lang.String)
   */
  public function get()
  {
      return $this->_client->call('getIssueTypes');
  }

  /**
   * Returns an array of all the (non-sub task) issue types for the specified
   * project ID.
   *
   * @param string $project_id
   *   The ID of the project.
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssueTypesForProject(java.lang.String, java.lang.String)
   */
  public function getForProject($project_id)
  {
      return $this->_client->call('getIssueTypesForProject', $project_id);
  }

  /**
   * Returns an array of all the sub task issue types in JIRA.
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getSubTaskIssueTypes(java.lang.String)
   */
  public function getSubTaskTypes()
  {
      return $this->_client->call('getSubTaskIssueTypes');
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
      return $this->_client->call('getSubTaskIssueTypesForProject', $project_id);
  }
}
