<?php


/**
 *
 */

namespace Jira\Remote;

/**
 *
 * @see http://docs.atlassian.com/rpc-jira-plugin/latest/com/atlassian/jira/rpc/soap/beans/RemoteAvatar.html
 */
class RemoteAvatar extends RemoteObject
{
    /**
     *
     * @var string
     */
    public $base64Data;

    /**
     *
     * @var string
     */
    public $contentType;

    /**
     *
     * @var int
     */
    public $id;

    /**
     *
     * @var string
     */
    public $owner;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var bool
     */
    public $system;

    /**
     * Provides the image data for the avatar.
     *
     * @return string
     */
    public function getBase64Data()
    {
        return $this->base64Data;
    }

    /**
     * Provides the MIME type of the image.
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * Provides the database unique identifier for the Avatar.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the entity to which this avatar belongs if it is custom.
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Provides a string reprentation of the type of avatar
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Provides a string reprentation of the type of avatar
     *
     * @return boolean
     */
    public function isSystem()
    {
        return $this->system;
    }
}
