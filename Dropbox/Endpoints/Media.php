<?php
/**
 * ZF-Dropbox - Endpoint Media
 *
 * Returns a link directly to a file from your dropbox.
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#media
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_Media implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_locale = 'DE';

    /**
     * set a path to the media file.
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_Media
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
     * @return ZendX_Dropbox_Endpoints_Media
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
        return $this;
    }

    /**
     *  Use to specify language settings.
     * 
     * @param string $locale
     * @return ZendX_Dropbox_Endpoints_Media
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
                'endpointurl' => 'https://api.dropbox.com/1/media/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'post'
        );
    }
}