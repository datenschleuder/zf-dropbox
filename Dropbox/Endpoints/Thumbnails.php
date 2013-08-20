<?php
/**
 * ZF-Dropbox - Endpoint Thumbnails
 * 
 * generate a thumbnail for an image
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @see        https://www.dropbox.com/developers/core/docs#thumbnails
 * @license    BSD
 */
final class ZendX_Dropbox_Endpoints_Thumbnails implements 
        ZendX_Dropbox_Interfaces_Endpoint
{

    private $_path = '';

    private $_root = 'sandbox';

    private $_format = 'jpeg';

    private $_size = 's';

    /**
     * The path to the image file.
     *
     * @param string $path            
     * @return ZendX_Dropbox_Endpoints_Thumbnails
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
     * @return ZendX_Dropbox_Endpoints_Thumbnails
     */
    public function setRoot ($root)
    {
        $this->_root = (string) $root;
        return $this;
    }

    /**
     * set a file format
     *
     * @param string $format            
     * @return ZendX_Dropbox_Endpoints_Thumbnails
     */
    public function setFileFormat ($format)
    {
        $this->_format = (string) $format;
        return $this;
    }

    /**
     * set file dimension
     * One of the following values (default: s):
     *
     * value	dimensions (px)
     *   xs	        32x32
     *   s          64x64
     *   m          128x128
     *   l          640x480
     *   xl	        1024x768
     *
     * @param string $size            
     * @return ZendX_Dropbox_Endpoints_Thumbnails
     */
    public function setFileDimension ($size)
    {
        $this->_size = (string) $size;
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
        $data = array(
                'size' => $this->_size,
                'format' => $this->_format
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
                'endpointurl' => 'https://api-content.dropbox.com/1/thumbnails/' .
                         $this->_root . '/' . $this->_path,
                        'method' => 'get'
        );
    }
}