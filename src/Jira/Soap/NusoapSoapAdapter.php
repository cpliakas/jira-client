<?php

/**
 *
 */

namespace Jira\Soap;

/**
 *
 */
class NusoapSoapAdapter implements JiraSoapInterface
{
    /**
     * The nusoap_client object.
     *
     * @var nusoap_client
     */
    protected $_soapClient;

    /**
     * Implements JiraSoapAbstract::__construct().
     */
    public function __construct($wsdl, array $options = array())
    {
        $options += array(
            'proxyhost' => false,
            'proxyport' => false,
            'proxyusername' => false,
            'proxypassword' => false,
            'timeout' => 0,
            'response_timeout' => 30,
            'portName' => '',
        );
        $this->_soapClient = new nusoap_client(
            $wsdl,
            true,
            $options['proxyhost'],
            $options['proxyport'],
            $options['proxyusername'],
            $options['proxypassword'],
            $options['timeout'],
            $options['response_timeout'],
            $options['portName']
        );
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
