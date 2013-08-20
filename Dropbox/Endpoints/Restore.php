<?php
/**
 * ZF-Dropbox - Endpoint Restore
 *
 * Restores a file path to a previous revision in your dropbox
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#restore
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_Restore implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_rev = 10;

    private $_locale = 'DE';

    /**
     * The path to the file.
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_Restore
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
     * @return ZendX_Dropbox_Endpoints_Restore
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
        return $this;
    }

    /**
     * set the given locale.
     * 
     * @param string $locale
     * @return ZendX_Dropbox_Endpoints_Restore
     */
    public function setLocale ($locale)
    {
        $this->_locale = (string) $locale;
        return $this;
    }

    /**
     * set a revision of the file to restore.
     * 
     * @param int $rev
     * @return ZendX_Dropbox_Endpoints_Restore
     */
    public function setRevision ($rev)
    {
        $this->_rev = (int) $rev;
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
                'rev' => $this->_rev,
                'locale' => $this->_locale
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
                'endpointurl' => 'https://api.dropbox.com/1/restore/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'post'
        );
    }
}