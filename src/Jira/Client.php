<?php

/**
 * @file
 * Contains Jira\JiraClient.
 */

namespace Jira;

/**
 * Wrapper around the Zend SOAP client connected to a JIRA instance.
 */
class Client
{

  /**
   * The WSDL endpoint.
   */
  const WSDL = '/rpc/soap/jirasoapservice-v2?wsdl';

  /**
   * The SOAP object.
   *
   * @var Zend\Soap\Client
   */
  protected $_client;

  /**
   * The JIRA authentication token for the user.
   *
   * @var string
   */
  protected $_token = '';

  /**
   * Constructs a Drupal_Jira_Client object.
   *
   * @param string $host
   *   The URL to the JIRA server.
   * @param array $options
   *   An array of options to pass to \Zend\Soap\Client.
   */
  public function __construct($host, array $options = array())
  {
      $wsdl = $host . self::WSDL;
      $this->_client = new \Zend\Soap\Client($wsdl, $options);
  }

  /**
   * Returns the authentication token.
   *
   * @param string $token
   *   The JIRA authentication token.
   */
  public function setToken($token)
  {
      $this->_token = $token;
      return $this;
  }

  /**
   * Returns the authentication token.
   *
   * @return string
   *   The JIRA authentication token.
   */
  public function getToken()
  {
      return $this->_token;
  }

  /**
   * Returns the SOAP client.
   *
   * @return \Zend\Soap\Client
   *   The instantiated SOAP client.
   */
  function getClient()
  {
      return $this->_client;
  }

  /**
   * Logs in to JIRA and sets the authentication token.
   *
   * @param string $username
   *   The JIRA user's username.
   * @param string $password
   *   The JIRA user's password.
   *
   * @return string
   *   The JIRA authentication token.
   */
  public function login($username, $password)
  {
      $token = $this->_client->login($username, $password);
      $this->setToken($token);
      return $token;
  }

  /**
   * Logs out of JIRA if a token is set.
   */
  public function logout()
  {
      if ($this->_token) {
          $this->_client->logout($this->_token);
      }
  }

  /**
   * Returns an issue request oject.
   *
   * @param string $issue_key
   *   The key of the issue to return, i.e "AB-123", "CD-456", etc.
   *
   * @return Jira/Request/Issue
   *   The request object for the issue.
   */
  public function issue($issue_key)
  {
      return new Request\Issue($this, $issue_key);
  }

  /**
   * Executes an RPC call to JIRA, passes the token as the first argument.
   *
   * Most authenticated RPC calls require passing the token as the first param.
   * This method automatically appends the token as the first param so that the
   * application doesn't have to worry about it.
   *
   * @param string $method
   *   The method being invoked.
   * @param ...
   *   All additional arguments after the authentication token passed as the
   *   parameters to the RPC call.
   *
   * @return mixed
   *   The data returned by the RPC call.
   */
  public function call($method)
  {
      $args = func_get_args();
      $args[0] = $this->_token;
      return $this->__call($method, $args);
  }

  /**
   * Pass all other method calls directly to the SOAP client.
   */
  public function __call($method, $args)
  {
      return call_user_func_array(array($this->_client, $method), $args);
  }
}
