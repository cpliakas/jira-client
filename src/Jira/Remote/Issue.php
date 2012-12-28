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
    public $affectsVersions = array();

    /**
     * The person the issue is assigned to.
     *
     * @var string
     */
    public $assignee;

    /**
     * An array of file attachment names.
     *
     * @var array
     */
    public $attachmentNames = array();

    /**
     * An array of \Jira\Remote\Component objects.
     *
     * @var array
     */
    public $components = array();

    /**
     * The date the issue was created in "" format.
     *
     * @var string
     */
    public $created;

    /**
     * An array of \Jira\Remote\CustomFieldValue objects.
     *
     * @var array
     */
    public $customFieldValues = array();

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
    public $fixVersions = array();

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
     * The numeric ID of the issue type.
     *
     * @var int
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
     * Overrides \Jira\Remote\Object::objectMappings().
     */
    public function objectMappings()
    {
        return array(
            'affectsVersions' => array(
                'classname' => '\Jira\Remote\Version',
                'array' => true,
            ),
            'components' => array(
                'classname' => '\Jira\Remote\Component',
                'array' => true,
            ),
            'customFieldValues' => array(
                'classname' => '\Jira\Remote\CustomFieldValue',
                'array' => true,
            ),
            'fixVersions' => array(
                'classname' => '\Jira\Remote\Version',
                'array' => true,
            ),
        );
    }

    /**
     * Creates an issue using this remote object.
     *
     * @param \Jira\Client $jira_client
     *   The JIRA client object.
     *
     * @return \Jira\Remote\Issue
     */
    public function create(\Jira\Client $jira_client)
    {
        if (!isset($this->key)) {
            return $jira_client->issue()->create($this);
        } else {
            throw new Exception('Issue cannot be created: Issue key is already set.');
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
        return $this->customFieldValues;
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
     * @return int
     *   Returns the numeric ID of the issue type.
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

    /**
     *
     * @param array $versions
     *   An array of \Jira\Remote\Version objects.
     *
     * @return \Jira\Remote\Issue
     */
    public function setAffectsVersions(array $versions)
    {
        $this->affectsVersions = $versions;
        return $this;
    }

    /**
     *
     * @param string $assignee
     *
     * @return \Jira\Remote\Issue
     */
    public function setAssignee($assignee)
    {
        $this->assignee = $assignee;
        return $this;
    }

    /**
     *
     * @param array $names
     *   An array of strings containing the attachment names.
     *
     * @return \Jira\Remote\Issue
     */
    public function setAttachmentNames($names)
    {
        $this->attachmentNames = $names;
        return $this;
    }

    /**
     *
     * @param array $components
     *   An array of \Jira\Remote\Component objects.
     *
     * @return \Jira\Remote\Issue
     */
    public function setComponents(array $components)
    {
        $this->components = $components;
        return $this;
    }

    /**
     *
     * @param array $values
     *   An array of \Jira\Remote\CustomFieldValue objects.
     *
     * @return \Jira\Remote\Issue
     */
    public function setCustomFieldValues(array $values)
    {
        $this->customFieldValues = $values;
    }

    /**
     *
     * @param string $description
     *
     * @return \Jira\Remote\Issue
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @param string $date
     *
     * @return \Jira\Remote\Issue
     */
    public function setDuedate($date)
    {
        $this->dueDate = $date;
        return $this;
    }

    /**
     *
     * @param string $environment
     *
     * @return \Jira\Remote\Issue
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     *
     * @param array $versions
     *   An array of \Jira\Remote\Version objects.
     *
     * @return \Jira\Remote\Issue
     */
    public function setFixVersions(array $versions)
    {
        $this->fixVersions = $versions;
        return $this;
    }

    /**
     *
     * @param string $priority
     *
     * @return \Jira\Remote\Issue
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     *
     * @param string $project
     *
     * @return \Jira\Remote\Issue
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

    /**
     *
     * @param string $reporter
     *
     * @return \Jira\Remote\Issue
     */
    public function setReporter($reporter)
    {
        $this->reporter = $reporter;
        return $this;
    }

    /**
     *
     * @param string $summary
     *
     * @return \Jira\Remote\Issue
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     *
     * @param int $type
     *   The numeric ID of the issue type.
     *
     * @return \Jira\Remote\Issue
     *
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     *
     * @param string $updated
     *
     * @return \Jira\Remote\Issue
     *
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }
}
