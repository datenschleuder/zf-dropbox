<?php
/**
 * ZF-Dropbox - Endpoint Shares
 *
 * Creates and returns a Dropbox link to files or folders from
 * your dropbox
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#shares
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_Shares implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_shorturl = 'true';

    private $_locale = 'DE';

    /**
     *  The path to the file or folder.
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_Shares
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
     * @return ZendX_Dropbox_Endpoints_Shares
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
        return $this;
    }

    /**
     * Use to specify language settings. 
     * 
     * @param string $locale
     * @return ZendX_Dropbox_Endpoints_Shares
     */
    public function setLocale ($locale)
    {
        $this->_locale = (string) $locale;
        return $this;
    }

    /**
     * When true the url returned will be shortened.
     * 
     * @param string $param
     * @return ZendX_Dropbox_Endpoints_Shares
     */
    public function setShortUrl ($param)
    {
        $this->_shorturl = (string) $param;
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
                'short_url' => $this->_shorturl,
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
                'endpointurl' => 'https://api.dropbox.com/1/shares/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'post'
        );
    }
}