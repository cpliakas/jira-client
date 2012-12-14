<?php

/**
 *
 */

namespace Jira\Request;

/**
 *
 */
class IssueTypes {

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
   *
   * @see
   */
  public function get()
  {

  }


}