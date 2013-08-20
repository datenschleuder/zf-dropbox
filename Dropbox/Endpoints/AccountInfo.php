<?php
/**
 * ZF-Dropbox - Endpoint AccountInfo
 * 
 * Retrieves information about the user's dropbox account.
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#account-info
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_AccountInfo implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_locale = 'DE';

    /**
     * specify language settings
     * 
     * @param string $locale
     * @return ZendX_Dropbox_Endpoints_AccountInfo
     */
    public function setLocale ($locale)
    {
        $this->_locale = (string) $locale;
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
        return array(
                'locale' => $this->_locale
        );
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
                'endpointurl' => 'https://api.dropbox.com/1/account/info/',
                'method' => 'get'
        );
    }
} 