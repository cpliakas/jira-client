<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteConstant.html
 */
class RemoteConstant extends RemoteNamedEntity
{
    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $icon;

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
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     *
     * @param string $description
     *
     * @return RemoteConstant
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @param string $icon
     *
     * @return RemoteConstant
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }
}
