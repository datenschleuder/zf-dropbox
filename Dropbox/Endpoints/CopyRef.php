<?php
/**
 * ZF-Dropbox - Endpoint CopyRef
 * 
 * Creates and returns a copy_ref to a file
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#copy_ref
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_CopyRef implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    /**
     * set path to the file
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_CopyRef
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
     * @return ZendX_Dropbox_Endpoints_CopyRef
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
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
        return array();
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
                'endpointurl' => 'https://api.dropbox.com/1/copy_ref/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'get'
        );
    }
}