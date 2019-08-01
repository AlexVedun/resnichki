<?php

namespace App\Helpers;

class GlobalFunctions
{
    public static function ConvertImage2base64 ($_file)
    {
        $image = public_path().$_file;
        $imageData = base64_encode(file_get_contents($image));
        return 'data: '.mime_content_type($image).';base64,'.$imageData;
    }
}
