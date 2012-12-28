<?php

/**
 * @file
 * Contains \Jira\Client.
 */

namespace Jira;

use Jira\Remote\Issue as RemoteIssue;
use Jira\Remote\PermissionScheme as RemotePermissionScheme;
use Jira\Remote\Scheme as RemoteScheme;
use Jira\Remote\User as RemoteUser;
use Jira\Request\Issue;
use Jira\Request\Issues;
use Jira\Request\IssueTypes;
use Jira\Request\Project;
use Jira\Request\User;
use Zend\Soap\Client as SoapClient;

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
     * @var \Zend\Soap\Client
     */
    protected $_soapClient;

    /**
     * The JIRA authentication token for the user.
     *
     * @var string
     */
    protected $_token = '';

    /**
     * Constructs a \Jira\Client object.
     *
     * @param string $host
     *   The URL to the JIRA server.
     * @param array $options
     *   An array of options to pass to \Zend\Soap\Client.
     */
    public function __construct($host, array $options = array())
    {
        $wsdl = rtrim($host, '/') . self::WSDL;
        $this->_soapClient = new SoapClient($wsdl, $options);
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
     * Returns an issue request object.
     *
     * @param string $issue_key
     *   The key of the issue to return, e.g. "AB-123", "CD-456". Defaults to
     *   null, which is useful for creating a new issue.
     *
     * @return \Jira\Request\Issue
     *   The request object for the issue.
     */
    public function issue($issue_key = null)
    {
        return new Issue($this, $issue_key);
    }

    /**
     * Returns an issues request object.
     *
     * @return \Jira\Request\Issues
     *   The request object for the issues.
     */
    public function issues()
    {
        return new Issues($this);
    }

    /**
     * Returns an issue types request object.
     *
     * @return \Jira\Request\IssueTypes
     *   The request object for issue types.
     */
    public function issueTypes()
    {
        return new IssueTypes($this);
    }

    /**
     * Returns a project request object.
     *
     * @param string $project_key
     *   The unique key of the project, e.g "AB", "CD".
     *
     * @return \Jira\Request\Project
     *   The request object for the project.
     */
    public function project($project_key)
    {
        return new Project($this, $project_key);
    }

    /**
     * Returns a user request object.
     *
     * @param string $username
     *   The unique machine name of the user.
     *
     * @return \Jira\Request\User
     *   The request object for the user.
     */
    public function user($username)
    {
        return new User($this, $username);
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
