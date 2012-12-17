<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteIssue.html
 */
class Issue extends Entity
{
    /**
     *
     */
    public function __construct($data = array())
    {
        parent::__construct($data);

        if (!empty($this->customFieldValues)) {
          $classname = '\Jira\Remote\CustomFieldValue';
          $this->customFieldValues = $this->buildArray($this->customFieldValues, $classname);
        }
    }

    /**
     * An array of \Jira\Remote\Version objects.
     *
     * @var array
     */
    public $affectsVersions;

    /**
     *
     */
    public function getAffectsVersions()
    {
        return $this->affectsVersions;
    }
}
