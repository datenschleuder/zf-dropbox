<?php
/**
 * ZF-Dropbox - Endpoint Metadata
 * 
 * Retrieves file and folder metadata in your dropbox.
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#metadata
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_Metadata implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_limit = 10000;

    private $_hash = '';

    private $_locale = 'DE';

    private $_list = 'false';

    private $_revision = 0;

    private $_include = 'false';

    
    /**
     * set a path to the file or folder 
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_Metadata
     */
    public function setPath ($path)
    {
        $this->_path = (string) $path;
        return $this;
    }

    /**
     * set sandbox or dropbox.
     * 
     * @param string $root
     * @return ZendX_Dropbox_Endpoints_Metadata
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
        return $this;
    }

    /**
     * set entrie limit (max is 25,000).
     * 
     * @param int $limit
     * @return ZendX_Dropbox_Endpoints_Metadata
     */
    public function setFileLimit ($limit)
    {
        $this->_limit = (int) $limit;
        return $this;
    }

    /**
     * set hash for metadata
     * 
     * @param string $hash
     * @return ZendX_Dropbox_Endpoints_Metadata
     */
    public function setHash ($hash)
    {
        $this->_hash = (string) $hash;
        return $this;
    }

    /**
     * set the given locale
     * 
     * @param string $locale
     * @return ZendX_Dropbox_Endpoints_Metadata
     */
    public function setLocale ($locale)
    {
        $this->_locale = (string) $locale;
        return $this;
    }

    /** 
     * If true, the folder's metadata will include a contents field with 
     * a list of metadata entries for the contents of the folder.
     * 
     * @param string $list
     * @return ZendX_Dropbox_Endpoints_Metadata
     */
    public function setList ($list)
    {
        $this->_list = (string) $list;
        return $this;
    }

    /**
     * Only applicable when list is set. If this parameter is set to true, 
     * then contents will include the metadata of deleted children.
     * 
     * @param string $include
     * @return ZendX_Dropbox_Endpoints_Metadata
     */
    public function setIncludeDeleted ($include)
    {
        $this->_include = (string) $include;
        return $this;
    }

    /**
     * If is set only the metadata for that revision will be returned.
     * 
     * @param int $rev
     * @return ZendX_Dropbox_Endpoints_Metadata
     */
    public function setRevision ($rev)
    {
        $this->_revision = (int) $rev;
        return $this;
    }

    /**
     * return GET-Parameter
     * 
     * (non-PHPdoc)
     * @see ZendX_Dropbox_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        $data2 = array();
        $data3 = array();
        $data = array(
                'hash' => $this->_hash,
                'locale' => $this->_locale,
                'file_limit' => $this->_limit,
                'list' => $this->_list
        );
        
        if ($this->_revision > 0) {
            $data2 = array(
                    'rev' => $this->_revision
            );
        }
        
        if ($this->_list == 'true') {
            $data3 = array(
                    'include_deleted' => $this->_include
            );
        }
        
        return array_merge($data, $data2, $data3);
    }

    /**
     * return url params
     * 
     * (non-PHPdoc)
     * @see ZendX_Dropbox_Interfaces_Endpoint::getUrl()
     * @return array
     */
    public function getUrl ()
    {
        return array(
                'endpointurl' => 'https://api.dropbox.com/1/metadata/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'get'
        );
    }
}