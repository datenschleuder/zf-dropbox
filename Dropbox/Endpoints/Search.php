<?php
/**
 * ZF-Dropbox - Endpoint Search
 *
 * Returns metadata for all files and folders in your dropbox
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#search
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_Search implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_filelimit = 1000;

    private $_query = '';

    private $_locale = 'DE';

    private $_include = 'false';

    /**
     * The path to the folder.
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_Search
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
     * @return ZendX_Dropbox_Endpoints_Search
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
        return $this;
    }

    /**
     * limit search results.
     * 
     * @param int $limit
     * @return ZendX_Dropbox_Endpoints_Search
     */
    public function setFileLimit ($limit)
    {
        $this->_filelimit = (int) $limit;
        return $this;
    }

    /**
     * set a search string.
     * 
     * @param string $query
     * @return ZendX_Dropbox_Endpoints_Search
     */
    public function setQuery ($query)
    {
        $this->_query = (string) $query;
        return $this;
    }

    /**
     * set the given locale.
     * 
     * @param string $locale
     * @return ZendX_Dropbox_Endpoints_Search
     */
    public function setLocale ($locale)
    {
        $this->_locale = (string) $locale;
        return $this;
    }

    /**
     * If this parameter is set to true, then files and folders 
     * that have been deleted will also be included in the search.
     * 
     * @param string $include
     * @return ZendX_Dropbox_Endpoints_Search
     */
    public function setIncludeDeleted ($include)
    {
        $this->_include = (string) $include;
        return $this;
    }

    /**
     * return POST-Parameter
     *
     * (non-PHPdoc)
     * @see ZendX_Dropbox_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        $data = array(
                'query' => $this->_query,
                'locale' => $this->_locale,
                'file_limit' => $this->_filelimit,
                'include_deleted' => $this->_include
        );
        
        return $data;
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
                'endpointurl' => 'https://api.dropbox.com/1/search/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'post'
        );
    }
}