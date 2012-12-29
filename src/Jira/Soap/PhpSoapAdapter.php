<?php

/**
 *
 */

namespace Jira\Soap;

/**
 *
 */
class PhpSoapAdapter implements JiraSoapInterface
{
    /**
     * The \SoapClient object.
     *
     * @var \SoapClient
     */
    protected $_soapClient;

    /**
     * Implements JiraSoapAbstract::__construct().
     */
    public function __construct($wsdl, array $options = array())
    {
        $this->_soapClient = new \SoapClient($wsdl, $options);
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
        return $this->_soapClient->__soapCall($method, $args);
    }
}
