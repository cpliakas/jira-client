<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteScheme.html
 */
class Scheme extends Object
{
    /**
     *
     * @var int
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     */
    public $type;

    /**
     *
     * @return int
     *
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return string
     */
    public function getName($name) {
        return $this->name;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     *
     * @param int $id
     *
     * @return \Jira\Remote\Scheme
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @param string $name
     *
     * @return \Jira\Remote\Scheme
     *
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @param string $description
     *
     * @return \Jira\Remote\Scheme
     *
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @param string $type
     *
     * @return \Jira\Remote\Scheme
     *
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }
}
