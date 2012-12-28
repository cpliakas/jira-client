<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteIssueType.html
 */
class RemoteIssueType extends RemoteConstant
{

  /**
   *
   * @var bool
   */
  public $subTask;

  /**
   *
   * @return bool
   */
  public function isSubTask()
  {
      return $this->subTask;
  }

  /**
   *
   * @param bool $sub_task
   *
   * @return RemoteIssueType
   */
  public function setSubTask($sub_task)
  {
      $this->subTask = (bool) $sub_task;
      return $this;
  }
}
