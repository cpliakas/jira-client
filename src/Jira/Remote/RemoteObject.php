<?php

/**
 *
 */

namespace Jira\Remote;

use InvalidArgumentException;

/**
 * Base class for all remote JIRA objects.
 */
class RemoteObject
{
    /**
     * Constructs a RemoteObject object.
     *
     * @param stdClass|array
     *   The data returned by the RPC call.
     */
    public function __construct($data = array())
    {
        // Normalize raw data returned from client.
        if (is_object($data)) {
            if (!$data instanceof Iterator) {
                $data = (array) $data;
            }
        } elseif (!is_array($data)) {
            $class = get_called_class();
            throw new InvalidArgumentException('First parameter passed to ' . $class . ' must be an object or array.');
        }

        // Store data as public properties, map to objects if applicable.
        $mappings = $this->objectMappings();
        foreach ($data as $key => $value) {
            if (isset($mappings[$key])) {
                $classname = $mappings[$key]['classname'];
                $is_array = !empty($mappings[$key]['array']);
                if (null === $value) {
                    $this->$key = ($is_array) ? array() : null;
                } elseif ($is_array) {
                    $this->$key = $this->buildObjectArray($value, $classname);
                } else {
                    $this->$key = new $classname($value);
                }
            } else {
                $this->$key = $value;
            }
        }
    }

    /**
     * Helper function that builds an array of objects.
     *
     * @param array $data
     *   The raw data returned by Request::call().
     * @param string $classname
     *   The name of the class used to create the objects.
     *
     * @return array
     *   Returns an array of $classname objects.
     */
    public function buildObjectArray(array $data, $classname)
    {
        $objects = array();
        foreach ($data as $object) {
          $objects[] = new $classname($object);
        }
        return $objects;
    }

    /**
     * Returns an array of object mappings.
     *
     * Data is returned in primitive structures from the SOAP client. This maps
     * the keys and properties to the corresponding RemoteObject objects.
     *
     * @return array
     *   An associative array keyed by property name to an associative array
     *   containing:
     *   - classname: The name of the class.
     *   - array: A boolean flagging whether the item is an array of objects.
     */
    public function objectMappings()
    {
        return array();
    }
}
