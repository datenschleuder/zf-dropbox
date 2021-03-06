<?php

/**
 * ZF-Dropbox - Endpoint FileOpsCreateFolder
 *
 * Creates a folder in your dropbox.
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#fileops-create-folder
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_FileOpsCreateFolder implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_locale = 'DE';

    /**
     * set the path to the new folder.
     *
     * @param string $path            
     * @return ZendX_Dropbox_Endpoints_FileOpsCreateFolder
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
     * @return ZendX_Dropbox_Endpoints_FileOpsCreateFolder
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
        return $this;
    }

    /**
     * set the given locale.
     *
     *
     * @param string $locale            
     * @return ZendX_Dropbox_Endpoints_FileOpsCreateFolder
     */
    public function setLocale ($locale)
    {
        $this->_locale = (string) $locale;
        return $this;
    }

    /**
     * return POST-Parameter
     *
     * (non-PHPdoc)
     * 
     * @see ZendX_Dropbox_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        $data = array(
                'root' => $this->_root,
                'locale' => $this->_locale,
                'path' => $this->_path
        );
        
        return $data;
    }

    /**
     * return url params
     *
     * (non-PHPdoc)
     * 
     * @see ZendX_Dropbox_Interfaces_Endpoint::getUrl()
     * @return array
     */
    public function getUrl ()
    {
        return array(
                'endpointurl' => 'https://api.dropbox.com/1/fileops/create_folder',
                'method' => 'post'
        );
    }
}