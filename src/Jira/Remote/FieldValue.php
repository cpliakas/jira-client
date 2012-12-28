<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteFieldValue.html
 */
class FieldValue extends Object
{
    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @var array
     */
    public $values;

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
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     *
     * @param string $id
     *
     * @return \Jira\Remote\FieldValue
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @param array $values
     *
     * @return \Jira\Remote\FieldValue
     */
    public function setValues(array $values)
    {
        $this->values = $values;
        return $this;
    }
}
