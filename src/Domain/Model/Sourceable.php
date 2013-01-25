<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 *
 */
trait Sourceable
{
    /**
     *
     * @var array
     */
    protected $_sources = array();

    /**
     *
     * @param array $sources
     */
    public function setSources(array $sources)
    {
        $this->_sources = $sources;
    }

    /**
     *
     * @return array
     */
    public function getSources()
    {
        return $this->_sources;
    }

    /**
     *
     * @param Branches\Domain\Model\Source\Source $source
     */
    public function addSource(Source\Source $source)
    {
        $this->_sources[] = $source;
    }
}
