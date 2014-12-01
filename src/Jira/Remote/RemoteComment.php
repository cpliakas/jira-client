<?php

namespace Jira\Remote;

/**
 *
 * @see https://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteComment.html
 */
class RemoteComment extends RemoteObject
{

  /**
   *
   * @var string
   */
  public $author;

  /**
   *
   * @var string
   */
  public $body;

 /**
  *
  * @var string
  */
  public $created;

  /**
   *
   * @var string
   */
  public $id;

  /**
   *
   * @var string
   */
  public $groupLevel;

  /**
   *
   * @var string
   */
  public $roleLevel;

  /**
   *
   * @var string
   */
  public $updateAuthor;

  /**
   *
   * @var string
   */
  public $updated;

  /**
   *
   * @return string
   *
   */
  public function getAuthor()
  {
    return $this->author;
  }

  /**
   *
   * @return string
   *
   */
  public function getBody()
  {
    return $this->body;
  }

 /**
  *
  * @return string
  */
  public function getCreated()
  {
    return $this->created;
  }

  /**
   *
   * @return string
   */
  public function getGroupLevel()
  {
    return $this->groupLevel;
  }

  /**
   *
   * @return string
   *
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   *
   * @return string
   *
   */
  public function getRoleLevel()
  {
    return $this->roleLevel;
  }

  /**
   *
   * @return string
   */
  public function getUpdateAuthor()
  {
    return $this->updateAuthor;
  }

  /**
   *
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }

  /**
   *
   * @param string $body
   *
   * @return RemoteComment
   */
  public function setBody($body)
  {
    $this->body = $body;
    return $this;
  }

  /**
   *
   * @param string $id
   *
   * @return RemoteComment
   */
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  /**
   *
   * @param string $group_level
   *
   * @return RemoteComment
   */
  public function setGroupLevel($group_level)
  {
    $this->groupLevel = $group_level;
    return $this;
  }

  /**
   *
   * @param string $role_level
   *
   * @return RemoteComment
   */
  public function setRoleLevel($role_level)
  {
    $this->roleLevel = $role_level;
    return $this;
  }
}
