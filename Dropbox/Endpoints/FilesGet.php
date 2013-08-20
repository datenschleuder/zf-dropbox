<?php
/**
 * ZF-Dropbox - Endpoint FilesGet
 *
 * Download a file from your dropbox
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#files-GET
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_FilesGet implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_revision = 0;

    /**
     * The path to the file you want to retrieve.
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
        $data = array();
        $data2 = array();
        
        if ($this->_revision > 0) {
            $data2 = array(
                    'rev' => $this->_revision
            );
        }
        
        return array_merge($data, $data2);
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
                'endpointurl' => 'https://api-content.dropbox.com/1/files/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'get'
        );
    }
}