<?php

/**
 *
 */

namespace Jira\Remote;

class Object
{
    /**
     *
     * @param stdClass|array
     *
     */
    public function __construct($data = array())
    {
        if (is_object($data) || is_array($data)) {
            $data = (array) $data;
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Helper function that builds an array of objects.
     *
     * @param array $data
     *   The raw data returned by \Jira\Request::call().
     * @param string $classname
     *   The name of the class used to create the objects.
     *
     * @return array
     *   Returns an array of $classname objects.
     */
    public function buildArray(array $data, $classname)
    {
        $objects = array();
        foreach ($data as $object) {
          $objects[] = new $classname($object);
        }
        return $objects;
    }
}
