<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteCustomFieldValue.html
 */
class RemoteCustomFieldValue extends RemoteObject
{
    /**
     *
     * @var string
     */
    public $customfieldId;

    /**
     *
     * @var string
     */
    public $key;

    /**
     *
     * @var array
     */
    public $values;

    /**
     *
     * @return string
     */
    public function getCustomfieldId()
    {
        return $this->customfieldId;
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
     * @return RemoteCustomFieldValue
     */
    public function setCustomfieldId($id)
    {
        $this->customfieldId = $id;
        return $this;
    }

    /**
     *
     * @param string $key
     *
     * @return RemoteCustomFieldValue
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     *
     * @param array $values
     *
     * @return RemoteCustomFieldValue
     */
    public function setValues($values)
    {
        $this->values = $values;
        return $this;
    }
}
