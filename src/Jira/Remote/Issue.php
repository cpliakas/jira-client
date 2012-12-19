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
     * An array of \Jira\Remote\Version objects.
     *
     * @var array
     */
    public $affectsVersions;

    /**
     *
     * @var string
     */
    public $assignee;

    /**
     *
     * @var array
     */
    public $attachmentNames;

    /**
     * An array of \Jira\Remote\Component objects.
     *
     * @var array
     */
    public $components;

    /**
     *
     * @var string
     */
    public $created;

    /**
     * An array of \Jira\Remote\CustomFieldValue objects.
     *
     * @var array
     */
    public $customFieldValue;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $dueDate;

    /**
     *
     * @var string
     */
    public $environment;

    /**
     * An array of \Jira\Remote\Version objects.
     *
     * @var array
     */
    public $fixVersions;

    /**
     *
     * @var string
     */
    public $key;

    /**
     *
     * @var string
     */
    public $priority;

    /**
     *
     * @var string
     */
    public $project;

    /**
     *
     * @var string
     */
    public $reporter;

    /**
     *
     * @var string
     */
    public $resolution;

    /**
     *
     * @var string
     */
    public $status;

    /**
     *
     * @var string
     */
    public $summary;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var string
     */
    public $updated;

    /**
     *
     * @var int
     */
    public $votes;

    /**
     *
     */
    public function __construct($data = array())
    {
        parent::__construct($data);

        if (!empty($this->affectsVersions)) {
            $classname = '\Jira\Remote\Version';
            $this->affectsVersions = $this->buildArray($this->affectsVersions, $classname);
        }
        if (!empty($this->components)) {
            $classname = '\Jira\Remote\Component';
            $this->components = $this->buildArray($this->components, $classname);
        }
        if (!empty($this->customFieldValues)) {
            $classname = '\Jira\Remote\CustomFieldValue';
            $this->customFieldValues = $this->buildArray($this->customFieldValues, $classname);
        }
        if (!empty($this->fixVersions)) {
            $classname = '\Jira\Remote\Version';
            $this->fixVersions = $this->buildArray($this->fixVersions, $classname);
        }
    }

    /**
     *
     */
    public function getAffectsVersions()
    {
        return $this->affectsVersions;
    }

    /**
     *
     * @return string
     */
    public function getAssignee()
    {
        return $this->assignee;
    }

    /**
     *
     * @return array
     */
    public function getAttachmentNames()
    {
        return $this->attachmentNames;
    }

    /**
     *
     * @return array
     *   An array of \Jira\Remote\Component objects.
     */
    public function getComponents()
    {
        return $this->componetns;
    }

    /**
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     *
     * @return array
     *   An array of \Jira\Remote\CustomFieldValue objects.
     */
    public function getCustomFieldValues()
    {
        return $this->customFieldValue;
    }

    /**
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return string
     */
    public function getDuedate()
    {
        return $this->dueDate;
    }

    /**
     *
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     *
     * @return array
     *   An array of \Jira\Remote\Version objects.
     */
    public function getFixVersions()
    {
        return $this->fixVersions;
    }

    /**
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     *
     * @return string
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     *
     * @return string
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     *
     * @return string
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     *
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     *
     * @return int
     */
    public function getVotes()
    {
        return $this->votes;
    }
}
