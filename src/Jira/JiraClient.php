<?php

/**
 * @file
 * Contains \Jira\Client.
 */

namespace Jira;

use Jira\Remote\CreatableInterface;
use Jira\Request\IssueRequest;
use Jira\Request\IssuesRequest;
use Jira\Request\IssueTypesRequest;
use Jira\Request\ProjectRequest;
use Jira\Request\UserRequest;
use Zend\Soap\Client as ZendSoapClient;

/**
 * Wrapper around the Zend SOAP client connected to a JIRA instance.
 */
class JiraClient
{
    /**
     * The WSDL endpoint.
     */
    const WSDL = '/rpc/soap/jirasoapservice-v2?wsdl';

    /**
     * The SOAP object.
     *
     * @var ZendSoapClient
     */
    protected $_soapClient;

    /**
     * The JIRA authentication token for the user.
     *
     * @var string
     */
    protected $_token = '';

    /**
     * Constructs a JiraClient object.
     *
     * @param string $host
     *   The URL to the JIRA server.
     * @param array $options
     *   An array of options to pass to ZendSoapClient.
     */
    public function __construct($host, array $options = array())
    {
        $wsdl = rtrim($host, '/') . self::WSDL;
        $this->_soapClient = new ZendSoapClient($wsdl, $options);
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
     * @return ZendSoapClient
     *   The instantiated SOAP client.
     */
    function getSoapClient()
    {
        return $this->_soapClient;
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
        $token = $this->_soapClient->login($username, $password);
        $this->setToken($token);
        return $token;
    }

    /**
     * Logs out of JIRA if a token is set.
     */
    public function logout()
    {
        if ($this->_token) {
            $this->_soapClient->logout($this->_token);
        }
    }

    /**
     * Creates an object via an API call.
     *
     * @param CreatableInterface $remote_object
     *
     * @return CreatableInterface
     */
    public function create(CreatableInterface $remote_object)
    {
        return $remote_object->create($this);
    }

    /**
     * Returns an issue request object.
     *
     * @param string $issue_key
     *   The key of the issue to return, e.g. "AB-123", "CD-456".
     *
     * @return IssueRequest
     *   The request object for the issue.
     */
    public function issue($issue_key)
    {
        return new IssueRequest($this, $issue_key);
    }

    /**
     * Returns an issues request object.
     *
     * @return IssuesRequest
     *   The request object for the issues.
     */
    public function issues()
    {
        return new IssuesRequest($this);
    }

    /**
     * Returns an issue types request object.
     *
     * @return IssueTypesRequest
     *   The request object for issue types.
     */
    public function issueTypes()
    {
        return new IssueTypesRequest($this);
    }

    /**
     * Returns a project request object.
     *
     * @param string $project_key
     *   The unique key of the project, e.g "AB", "CD".
     *
     * @return ProjectRequest
     *   The request object for the project.
     */
    public function project($project_key)
    {
        return new ProjectRequest($this, $project_key);
    }

    /**
     * Returns a user request object.
     *
     * @param string $username
     *   The unique machine name of the user.
     *
     * @return UserRequest
     *   The request object for the user.
     */
    public function user($username)
    {
        return new UserRequest($this, $username);
    }

    /**
     * Executes an RPC call to JIRA, passes the token as the first argument.
     *
     * Most authenticated RPC calls require passing the token as the first
     * param. This method automatically appends the token as the first param so
     * that the application doesn't have to worry about it.
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
        return call_user_func_array(array($this->_soapClient, $method), $args);
    }
}
