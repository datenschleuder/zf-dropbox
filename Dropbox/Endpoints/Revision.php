<?php
/**
 * ZF-Dropbox - Endpoint Revision
 *
 * Obtains metadata for the previous revisions of a file
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#revisions
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_Revision implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_revlimit = 10;

    private $_locale = 'DE';

    /**
     * The path to the file.
     * 
     * @param string $path
     * @return ZendX_Dropbox_Endpoints_Revision
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
     * @return ZendX_Dropbox_Endpoints_Revision
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
     * @return ZendX_Dropbox_Endpoints_Revision
     */
    public function setLocale ($locale)
    {
        $this->_locale = (string) $locale;
        return $this;
    }

    /**
     * set a revision limit default is 10. Max is 1,000.
     * 
     * @param int $revlimit
     * @return ZendX_Dropbox_Endpoints_Revision
     */
    public function setRevisionLimit ($revlimit)
    {
        $this->_revlimit = (int) $revlimit;
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
        $data = array(
                'rev_limit' => $this->_revlimit,
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
                'endpointurl' => 'https://api.dropbox.com/1/revisions/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'get'
        );
    }
}