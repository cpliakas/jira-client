<?php

/**
 *
 */

namespace Jira;

/**
 *
 */
class Request
{
    /**
     *
     * @var \Jira\Client
     */
    protected $_client;

    /**
     *
     *
     * @var string|null
     */
    protected $_uniqueKey;

    /**
     * Constructs a \Jira\Request object.
     *
     * @param \Jira\Client $client
     *   The JIRA client object that instantiated this class.
     * @param string|null
     *   An optional unique key for this object e.g. the issue key, project key,
     *   etc. Defaults to null.
     */
    public function __construct(Client $client, $unique_key = null)
    {
        $this->_client = $client;
        $this->_uniqueKey = $unique_key;
    }

    /**
     *
     * @return \Jira\Client
     */
    public function getClient()
    {
        return $this->_client;
    }

    /**
     *
     * @param string $unique_key
     *
     * @return string|null
     *   The unique key, null if a unique key was not set.
     */
    public function getUniqueKey()
    {
        $this->_uniqueKey = $unique_key;
    }

    /**
     * Wrapper around \Jira\Client::call() that adds the objects unique key as
     * the second argument of the RPC call. For example, issue requests require
     * the issue key, project requests require the project key, etc.
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
        if (null !== $this->_uniqueKey) {
          $args[0] = $this->_uniqueKey;
          array_unshift($args, $method);
        }
        return call_user_func_array(array($this->_client, 'call'), $args);
    }

    /**
     * Helper function that returns an array of objects.
     *
     * @param array $data
     *   The raw data returned by \Jira\Request::call().
     * @param string $classname
     *   The name of the class used to create the objects.
     *
     * @return array
     *   Returns an array of $classname objects.
     */
    public function returnArray(array $data, $classname)
    {
        $objects = array();
        foreach ($data as $object) {
          $objects[] = new $classname($object);
        }
        return $objects;
    }
}
