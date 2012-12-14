<?php

/**
 *
 */

namespace Jira\Request;

/**
 *
 */
class Issue {

  /**
   *
   */
  protected $_issueKey;

  /**
   *
   * @var Jira\Client
   */
  protected $_client;

  /**
   *
   */
  public function __construct(\Jira\Client $client, $issue_key)
  {
      $this->_client = $client;
      $this->_issueKey = $issue_key;
  }

  /**
   * Wrapper around \Jira\Client::call() that adds the issue key as the second
   * argument of the RPC call.
   *
   * @param string $method
   *   The method being invoked.
   * @param ...
   *   All additional arguments after the authentication token and issue key
   *   passed as the parameters to the RPC call.
   *
   * @return mixed
   *   The data returned by the RPC call.
   */
  public function call($method) {
      $args = func_get_args();
      $args[0] = $this->_issueKey;
      return $this->_client->call($method, $args);
  }

  /**
   * Returns information about the issue.
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssue(java.lang.String, java.lang.String)
   */
  public function get()
  {
      return $this->call('getIssue');
  }

  /**
   * Deletes the issue.
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#deleteIssue(java.lang.String, java.lang.String)
   */
  public function delete()
  {
      return $this->call('deleteIssue');
  }

  /**
   * Updates the issue with new values.
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#updateIssue(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteFieldValue[])
   */
  public function update()
  {
      return $this->_client->call('deleteIssue');
  }

  /**
   * Uploads an attachment to the issue with the specified issue key.
   *
   * @param string $filename
   *   The name of the attachment to be uploaded.
   * @param array $filedata
   *   A Base 64 encoded string of the attachment to be uploaded.
   *
   * @see Jira\Request\addAttachments()
   */
  public function addAttachment($filename, $filedata)
  {
      return $this->addAttachments(array($filename), array($filedata));
  }

  /**
   * Uploads an attachment to the issue with the specified issue key.
   *
   * @param array $filenames
   *   An array of filenames; each element names an attachment to be uploaded.
   * @param array $filedata
   *   An array of Base 64 encoded Strings; each element contains the data of
   *   the attachment to be uploaded
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addBase64EncodedAttachmentsToIssue(java.lang.String, java.lang.String, java.lang.String[], java.lang.String[])
   */
  public function addAttachments(array $filenames, array $filedata)
  {
      return $this->call('addBase64EncodedAttachmentsToIssue', $filenames, $filedata);
  }

  /**
   * Adds a comment to the specified issue.
   *
   * @param \Jira\Object\Comment $comment
   *   The new comment to add.
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addComment(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteComment)
   */
  public function addComment(\Jira\Object\Comment $comment)
  {
      return $this->call('addComment', $comment);
  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addWorklogAndAutoAdjustRemainingEstimate(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteWorklog)
   */
  public function addWorklogAndAutoAdjustRemainingEstimate()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addWorklogAndRetainRemainingEstimate(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteWorklog)
   */
  public function addWorklogAndRetainRemainingEstimate()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addWorklogWithNewRemainingEstimate(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteWorklog, java.lang.String)
   */
  public function addWorklogWithNewRemainingEstimate()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#createIssueWithParent(java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteIssue, java.lang.String)
   */
  public function createChild()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#createIssueWithParentWithSecurityLevel(java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteIssue, java.lang.String, java.lang.Long)
   */
  public function createChildWithSecurityLevel()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getAttachmentsFromIssue(java.lang.String, java.lang.String)
   */
  public function getAttachments()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getAvailableActions(java.lang.String, java.lang.String)
   */
  public function getAvailableActions()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getComments(java.lang.String, java.lang.String)
   */
  public function getComments()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getFieldsForAction(java.lang.String, java.lang.String, java.lang.String)
   */
  public function getFieldsForAction()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getFieldsForEdit(java.lang.String, java.lang.String)
   */
  public function getFieldsForEdit()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getResolutionDateByKey(java.lang.String, java.lang.String)
   */
  public function getResolutionDate()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getSecurityLevel(java.lang.String, java.lang.String)
   */
  public function getSecurityLevel()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getWorklogs(java.lang.String, java.lang.String)
   */
  public function getWorklogs()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#hasPermissionToCreateWorklog(java.lang.String, java.lang.String)
   */
  public function hasPermissionToCreateWorklog()
  {

  }

  /**
   *
   * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#progressWorkflowAction(java.lang.String, java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteFieldValue[])
   */
  public function progressWorkflowAction()
  {

  }

}
