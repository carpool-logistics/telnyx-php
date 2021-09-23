<?php

namespace Telnyx;

/**
 * Class Media
 *
 * @package Telnyx
 */
class Media extends ApiResource
{
    const OBJECT_NAME = "media";

    use ApiOperations\All;
    use ApiOperations\Create{
        create as upload; // Alias for upload()
    }
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    use ApiOperations\Delete;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        // Original function inside ApiResource.php
        return "/v2/media";
    }
    
    /**
     * Download Media
     * 
     * Retrieve uploaded media. Media is typically available for 30 days after uploading.
     *
     * @param string|null $whatsapp_user_id
     * @param string|null $media_id
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return
     */
    public static function download($media_name, $params = null, $options = null)
    {
        $url = static::classUrl() . '/' . $media_name . '/download';

        $params = $params ?: [];
        $headers = $options ?: [];

        list($resp, $success, $rcode, $rheaders, $opts) = static::_staticRequestRaw('get', $url, $params, $headers);
        return $resp;
    }
    
}
