<?php
/**
 * ZF-Dropbox - Endpoint Delta
 *
 * show changes to files and folders in a user's Dropbox.
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#delta
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_Delta implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_cursor = NULL;

    private $_locale = 'DE';

    /**
     * set keep track of your current state.
     * 
     * @param string $cursor
     * @return ZendX_Dropbox_Endpoints_Delta
     */
    public function setCursor ($cursor)
    {
        $this->_cursor = (string) $cursor;
        return $this;
    }

    /**
     * set the given locale.
     * 
     * @param string $locale
     * @return ZendX_Dropbox_Endpoints_Delta
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
                'locale' => $this->_locale
        );
        $data2 = array();
        
        if (! is_null($this->_cursor)) {
            $data2 = array(
                    'cursor' => $this->_cursor
            );
        }
        
        return array_merge($data, $data2);
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
                'endpointurl' => 'https://api.dropbox.com/1/delta/',
                'method' => 'post'
        );
    }
}