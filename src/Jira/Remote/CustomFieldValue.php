<?php

/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteCustomFieldValue.html
 */
class CustomFieldValue extends Object
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
     * @return \Jira\Remote\CustomFieldValue
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
     * @return \Jira\Remote\CustomFieldValue
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
     * @return \Jira\Remote\CustomFieldValue
     */
    public function setValues($values)
    {
        $this->values = $values;
        return $this;
    }
}
