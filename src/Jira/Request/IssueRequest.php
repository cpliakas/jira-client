<?php

/**
 *
 */

namespace Jira\Request;

use Exception;
use Jira\Remote\RemoteComment;
use Jira\Remote\RemoteIssue;
use Jira\Remote\RemoteWorklog;

/**
 *
 */
class IssueRequest extends JiraRequest
{
    /**
     * Uploads an attachment to the issue with the specified issue key.
     *
     * @param string $filename
     *   The name of the attachment to be uploaded.
     * @param array $filedata
     *   A Base 64 encoded string of the attachment to be uploaded.
     *
     * @see IssueRequest::addAttachments()
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
     * @param RemoteComment $comment
     *   The new comment to add.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addComment(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteComment)
     */
    public function addComment(RemoteComment $comment)
    {
        return $this->call('addComment', $comment);
    }

    /**
     * Adds a worklog to the issue. The issue's time spent field will be
     * increased by the amount in RemoteWorklog::getTimeSpent().
     *
     * @param RemoteWorklog $worklog
     *   The worklog object.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addWorklogAndAutoAdjustRemainingEstimate(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteWorklog)
     */
    public function addWorklogAndAutoAdjustRemainingEstimate(RemoteWorklog $worklog)
    {
        return $this->call('addWorklogAndAutoAdjustRemainingEstimate', $worklog);
    }

    /**
     * Adds a worklog to the given issue but leaves the issue's remaining
     * estimate field unchanged. The issue's time spent field will be increased
     * by the amount in RemoteWorklog::getTimeSpent().
     *
     * @param RemoteWorklog $worklog
     *   The worklog object.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addWorklogAndRetainRemainingEstimate(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteWorklog)
     */
    public function addWorklogAndRetainRemainingEstimate(RemoteWorklog $worklog)
    {
        return $this->call('addWorklogAndRetainRemainingEstimate', $worklog);
    }

    /**
     * Adds a worklog to the given issue and sets the issue's remaining estimate
     * field to the given value. The issue's time spent field will be increased
     * by the amount in RemoteWorklog::getTimeSpent().
     *
     * @param RemoteWorklog $worklog
     *   The worklog object.
     * @param string $estimate
     *   The new value for the issue's remaining estimate as a duration string,
     *   e.g. "1d", "2h".
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#addWorklogWithNewRemainingEstimate(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteWorklog, java.lang.String)
     */
    public function addWorklogWithNewRemainingEstimate(RemoteWorklog $worklog, $estimate)
    {
        return $this->call('addWorklogWithNewRemainingEstimate', $worklog, $estimate);
    }

    /**
     * Creates an issue based on the passed details and makes it a child (e.g.
     * subtask) of this issue.
     *
     * @param RemoteIssue $issue
     *   The new issue to create.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#createIssueWithParent(java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteIssue, java.lang.String)
     */
    public function createChildIssue(RemoteIssue $issue)
    {
        // We cannot use IssueRequest::call() since the issue key is passed as
        // the last argument of the RPC call.
        $method = 'createChildIssue';
        if ($this->_uniqueKey) {
            return $this->_jiraClient->call($method, $issue, $this->_uniqueKey);
        } else {
            throw new Exception('Method "' . $method . '" requires a unique key to be passed as an argument.');
        }
    }

    /**
     * Creates an issue based on the passed details and security level and makes
     * it a child (e.g. subtask) of this issue.
     *
     * @param RemoteIssue $issue
     *   The new issue to create.
     * @param int $security_level
     *   The id of the required security level.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#createIssueWithParentWithSecurityLevel(java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteIssue, java.lang.String, java.lang.Long)
     */
    public function createChildIssueWithSecurityLevel(RemoteIssue $issue, $security_level)
    {
        // We cannot use IssueRequest::call() since the issue key is passed as
        // the third argument of the RPC call.
        $method = 'createChildIssueWithSecurityLevel';
        if ($this->_uniqueKey) {
            return $this->_jiraClient->call($method, $issue, $this->_uniqueKey, $security_level);
        } else {
            throw new Exception('Method "' . $method . '" requires a unique key to be passed as an argument.');
        }
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
     * Returns information about the issue.
     *
     * @return RemoteIssue
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getIssue(java.lang.String, java.lang.String)
     */
    public function get()
    {
        $data = $this->call('getIssue');
        return new RemoteIssue($data);
    }

    /**
     * Returns the attachments that are associated with this issue.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getAttachmentsFromIssue(java.lang.String, java.lang.String)
     */
    public function getAttachments()
    {
        return $this->call('getAttachmentsFromIssue');
    }

    /**
     * Returns the available actions that can be applied to this issue.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getAvailableActions(java.lang.String, java.lang.String)
     */
    public function getAvailableActions()
    {
        return $this->call('getAvailableActions');
    }

    /**
     * Gets the comments for this issue.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getComments(java.lang.String, java.lang.String)
     */
    public function getComments()
    {
        $data =  $this->call('getComments');
        return $this->returnObjectArray($data, '\Jira\Remote\RemoteComment');
    }

    /**
     * Returns the fields that are shown during an issue action.
     *
     * @param string $action_id
     *   The id of issue action to be executed.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getFieldsForAction(java.lang.String, java.lang.String, java.lang.String)
     */
    public function getFieldsForAction($action_id)
    {
        return $this->call('getComments', $action_id);
    }

    /**
     * Returns the fields that are shown when editing this issue.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getFieldsForEdit(java.lang.String, java.lang.String)
     */
    public function getFieldsForEdit()
    {
        return $this->call('getFieldsForEdit');
    }

    /**
     * Returns the resolution date for this issue. If the issue hasn't been
     * resolved yet, this method will return null.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getResolutionDateByKey(java.lang.String, java.lang.String)
     */
    public function getResolutionDate()
    {
        return $this->call('getResolutionDateByKey');
    }

    /**
     * Returns the current security level for this issue.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getSecurityLevel(java.lang.String, java.lang.String)
     */
    public function getSecurityLevel()
    {
        return $this->call('getSecurityLevel');
    }

    /**
     * Returns all worklogs for this issue.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#getWorklogs(java.lang.String, java.lang.String)
     */
    public function getWorklogs()
    {
        return $this->call('getWorklogs');
    }

    /**
     * Determines if the logged in user has the permission to add worklogs to
     * this issue, that timetracking is enabled in JIRA, and that this issue is
     * in an editable workflow state.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#hasPermissionToCreateWorklog(java.lang.String, java.lang.String)
     */
    public function hasPermissionToCreateWorklog()
    {
        return $this->call('hasPermissionToCreateWorklog');
    }

    /**
     * Progresses this issue through a workflow.
     *
     * @param string $action_id
     *   The id of the workflow action to progress to.
     * @param array $fields
     *   An array of RemoteField objects that are changed in the workflow step.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#progressWorkflowAction(java.lang.String, java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteFieldValue[])
     */
    public function progressWorkflowAction($action_id, array $fields = array())
    {
        return $this->call('progressWorkflowAction', $action_id, $fields);
    }

    /**
     * Updates the issue with new values.
     *
     * @param array $field_values
     *   An array of RemoteFieldValue objects.
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#updateIssue(java.lang.String, java.lang.String, com.atlassian.jira.rpc.soap.beans.RemoteFieldValue[])
     */
    public function update(array $field_values)
    {
        return $this->call('updateIssue', $field_values);
    }
}
