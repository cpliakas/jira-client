<?php

/**
 * RemoteGroup current only supports getting the object and the name. You will need to use the JiraClient->call
 * method to use addUserToGroup. To use this function you will to call JiraClient->group(name) first and use
 * it as a parameter.
 */

namespace Jira\Remote;

use Jira\JiraClient;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteGroup.html
 */
class RemoteGroup extends RemoteObject implements CreatableInterface
{

    /**
     *
     * @var string
     */
    public $name;

    /**
     * Implements CreatableInterface::create().
     *
     * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/JiraSoapService.html#createUser(java.lang.String, java.lang.String, java.lang.String, java.lang.String, java.lang.String)
     */
    public function create(JiraClient $jira_client)
    {
        $data = $jira_client->call('createGroup', $this->name);
        return new RemoteGroup($data);
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}
