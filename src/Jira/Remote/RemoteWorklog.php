<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteWorklog.html
 */
class RemoteWorklog extends RemoteObject
{

    /**
     *
     * @var string
     */
    public $author;

    /**
     *
     * @var string
     */
    public $comment;

    /**
     *
     * @var string
     */
    public $created;

    /**
     *
     * @var string
     */
    public $groupLevel;

    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @var string
     */
    public $roleLevelId;

    /**
     *
     * @var string
     */
    public $startDate;

    /**
     *
     * @var string
     */
    public $timeSpent;

    /**
     *
     * @var int
     */
    public $timeSpentInSeconds;

    /**
     *
     * @var string
     */
    public $updateAuthor;

    /**
     *
     * @var string
     */
    public $updated;

    /**
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
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
     * @return string
     */
    public function getGroupLevel()
    {
        return $this->groupLevel;
    }

    /**
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return string
     */
    public function getRoleLevelId()
    {
        return $this->roleLevelId;
    }

    /**
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     *
     * @return string
     *   JIRA time durations are in the following format:
     *   - minutes: "3m", "10m", "120m"
     *   - hours: "3h", "10h", "120h"
     *   - days: "3d", "10d", "120d"
     *   - weeks: "3w", "10w", "120w"
     */
    public function getTimeSpent()
    {
        return $this->timeSpent;
    }

    /**
     *
     * @return int
     */
    public function getTimeSpentInSeconds()
    {
        return $this->timeSpentInSeconds;
    }

    /**
     *
     * @return string
     */
    public function getUpdateAuthor()
    {
        return $this->updateAuthor;
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
     * @param string $comment
     *
     * @return RemoteWorklog
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     *
     * @param string $group_level
     *
     * @return RemoteWorklog
     */
    public function setGroupLevel($group_level)
    {
        $this->groupLevel = $group_level;
        return $this;
    }

    /**
     *
     * @param string $id
     *
     * @return RemoteWorklog
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @param string $id
     *
     * @return RemoteWorklog
     */
    public function setRoleLevelId($id)
    {
        $this->roleLevelId = $id;
        return $this;
    }

    /**
     *
     * @param string $date
     *
     * @return RemoteWorklog
     */
    public function setStartDate($date)
    {
        $this->startDate = $date;
        return $this;
    }

    /**
     *
     * @param string $time_spent
     *   JIRA time durations are in the following format:
     *   - minutes: "3m", "10m", "120m"
     *   - hours: "3h", "10h", "120h"
     *   - days: "3d", "10d", "120d"
     *   - weeks: "3w", "10w", "120w"
     *
     * @return RemoteWorklog
     */
    public function setTimeSpent($time_spent)
    {
        $this->timeSpent = $time_spent;
        return $this;
    }
}
