<?php

namespace Damascus;

/**
 * A simple implementation of a dataBucket
 *
 * @package Damascus
 */
class DataBucket implements DataBucketInterface, \ArrayAccess
{
    /** @var array */
    private $data = [];

    /**
     * DataBucket constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->data['offset']);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->data[$offset]);
        }
    }
    
    public function get($key, $defaultValue = null)
    {
        $value = $this->offsetGet($key);

        return null === $value ? $defaultValue : $value;
    }

    public function has($key)
    {
        return $this->offsetExists($key);
    }

    public function set($key, $value)
    {
        $this->offsetSet($key, $value);
    }


}
