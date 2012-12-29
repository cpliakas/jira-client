<?php

/**
 *
 */

namespace Jira\Soap;

use Zend\Soap\Client;

/**
 *
 */
class ZendSoapAdapter implements JiraSoapInterface
{
    /**
     * The Client object.
     *
     * @var Client
     */
    protected $_soapClient;

    /**
     * Implements JiraSoapAbstract::__construct().
     */
    public function __construct($wsdl, array $options = array())
    {
        $this->_soapClient = new Client($wsdl, $options);
    }

    /**
     * Implements JiraSoapAbstract::getSoapClient().
     */
    public function getSoapClient()
    {
        return $this->_soapClient;
    }

    /**
     * Implements JiraSoapAbstract::call().
     */
    public function call($method, array $args = array())
    {
        return $this->_soapClient->call($method, $args);
    }
}
