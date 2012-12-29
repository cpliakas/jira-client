<?php

/**
 *
 */

namespace Jira\Soap;

/**
 *
 */
interface JiraSoapInterface
{
    /**
     * Constructs a JiraSoapInterface object.
     *
     * @param string $wsdl
     *   URI of the WSDL file.
     * @param array $options
     *   An array of options to pass to SoapClient.
     */
    public function __construct($wsdl, array $options = array());

    /**
     * Returns the SOAP client.
     *
     * @return mixed
     *   The SOAP client object.
     */
    public function getSoapClient();

    /**
     * Executes an RPC call via the SOAP client.
     *
     * @param string $method
     *   The method being invoked.
     * @param array $args
     *   Additional arguments to pass to the method.
     *
     * @return mixed
     *   The data returned by the RPC call.
     */
    public function call($method, array $args = array());
}
