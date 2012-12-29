<?php

/**
 *
 */

namespace Jira\Remote;

use Jira\JiraClient;

/**
 * Inteface implemented by remote objects that can be created via an API call.
 */
interface CreatableInterface
{
    /**
     * Creates the object in JIRA via an API call.
     *
     * @param JiraClient $jira_client
     */
    public function create(JiraClient $jira_client);
}
