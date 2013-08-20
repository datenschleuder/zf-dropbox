<?php
/**
 * ZF-Dropbox - Endpoint FilesPut
 *
 * Upload a file to your dropbox
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#files_put
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_FilesPut implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_revision = 0;
    
    private $_overwrite = 'true';
    
    private $_locale = 'DE';

    /**
     * set the full path to the file
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_FilesGet
     */
    public function setPath ($path)
    {
        $this->_path = (string) $path;
        return $this;
    }
    
    /**
     * overwrite a file in your dropbox
     * 
     * @param string $overwrite
     * @return ZendX_Dropbox_Endpoints_FilesPut
     */
    public function setOverwrite($overwrite)
    {
        $this->_overwrite = (string) $overwrite;
        return $this;
    }
    
    /**
     * set the given locale.
     * 
     * @param string $locale
     * @return ZendX_Dropbox_Endpoints_FilesPut
     */
    public function setLocale($locale)
    {
        $this->_locale = (string) $locale;
        return $this;
    }

    /**
     * set sandbox or dropbox.
     * 
     * @param string $root
     * @return ZendX_Dropbox_Endpoints_FilesGet
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
        return $this;
    }

    /**
     * set a revision of the file.
     * 
     * @param int $rev
     * @return ZendX_Dropbox_Endpoints_FilesGet
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
     *
     * @see ZendX_Dropbox_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        $data = array(
                'overwrite' => $this->_overwrite,
                'locale' => $this->_locale,
                'parent_rev' => $this->_revision
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
                'endpointurl' => 'https://api-content.dropbox.com/1/files_put/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'post'
        );
    }
}