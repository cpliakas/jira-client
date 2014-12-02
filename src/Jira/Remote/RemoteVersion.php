<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteVersion.html
 */
class RemoteVersion extends RemoteNamedEntity
{
    /**
     *
     * @var bool
     */
    public $released;

    /**
     *
     * @var bool
     */
    public $archived;

    /**
     *
     * @var int
     */
    public $sequence;

    /**
     *
     * @var string
     */
    public $releaseDate;

    /**
     *
     * @return string
     *   The release date e.g. "1982-03-19T00:00:00.000Z".
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     *
     * @return int
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     *
     * @return bool
     */
    public function isArchived()
    {
        return $this->archived;
    }

    /**
     *
     * @return bool
     */
    public function isReleased()
    {
        return $this->released;
    }

    /**
     *
     * @param bool $archived
     *
     * @return RemoteVersion
     */
    public function setArchived($archived)
    {
        $this->archived = (bool) $archived;
        return $this;
    }

    /**
     *
     * @param bool $released
     *
     * @return RemoteVersion
     */
    public function setReleased($released)
    {
        $this->released = (bool) $released;
        return $this;
    }

    /**
     *
     * @param string $release_date
     *   The release date e.g. "1982-03-19T00:00:00.000Z".
     *
     * @return RemoteVersion
     */
    public function setReleaseDate($release_date)
    {
        $this->releaseDate = $release_date;
        return $this;
    }

    /**
     *
     * @param int $sequence
     *
     * @return RemoteVersion
     */
    public function setSequence($sequence)
    {
        $this->sequence = (int) $sequence;
        return $this;
    }
}
