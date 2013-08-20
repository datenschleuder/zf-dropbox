<?php
/**
 * ZF-Dropbox - Endpoint FileOpsMove
 *
 * Moves a file or folder to a new location in your dropbox.
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#fileops-move
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_FileOpsCopy implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_frompath = '';

    private $_root = 'sandbox';

    private $_topath = '';

    private $_locale = 'DE';

    /**
     * Specifies the file or folder to be moved.
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_FileOpsCopy
     */
    public function setFromPath ($path)
    {
        $this->_frompath = (string) $path;
        return $this;
    }

    /**
     * set sandbox or dropbox.
     * 
     * @param string $root
     * @return ZendX_Dropbox_Endpoints_FileOpsCopy
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
        return $this;
    }

    /**
     * Specifies the destination path.
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_FileOpsCopy
     */
    public function setToPath ($path)
    {
        $this->_topath = (string) $path;
        return $this;
    }

    /**
     * set the given locale.
     * 
     * @param string $locale
     * @return ZendX_Dropbox_Endpoints_FileOpsCopy
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
     * @see ZendX_Dropbox_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        $data = array(
                'root' => $this->_root,
                'locale' => $this->_locale,
                'from_path' => $this->_frompath,
                'to_path' => $this->_topath
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
                'endpointurl' => 'https://api.dropbox.com/1/fileops/move',
                'method' => 'post'
        );
    }
}