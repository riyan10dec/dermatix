<?php

function assets_path($url = null){
    return Theme::asset()->url($url);
}

function uploads_path($url = null){
    return URL::to('uploads/'.$url);
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text))
    {
        return 'n-a';
    }

    return $text;
}

function tagline($body, $limit){
    return Str::limit(strip_tags($body), $limit);
}

function sanitizer($filename)
{
    $extension = '.jpg';
    if (preg_match("/jpg|jpeg/i", $filename)){$extension=".jpg";}
    if (preg_match("/png/i", $filename)){$extension=".png";}
    if (preg_match("/gif/i", $filename)){$extension=".gif";}
    if (preg_match("/bmp/i", $filename)){$extension=".bmp";}
    if (preg_match("/pdf/i", $filename)){$extension=".pdf";}
    if (preg_match("/xlsx/i", $filename)){$extension=".xlsx";}
    if (preg_match("/xls/i", $filename)){$extension=".xls";}
    if (preg_match("/docx/i", $filename)){$extension=".docx";}
    if (preg_match("/doc/i", $filename)){$extension=".doc";}
    if (preg_match("/rtf/i", $filename)){$extension=".rtf";}
    if (preg_match("/html/i", $filename)){$extension=".html";}
    if (preg_match("/htm/i", $filename)){$extension=".htm";}
    if (preg_match("/zip/i", $filename)){$extension=".zip";}
    if (preg_match("/rar/i", $filename)){$extension=".rar";}

    // Take out illegal char in name
    list($name)=explode($extension, $filename);
    $name = sanitize($name);

    $new_name = $name.$extension;

    return $new_name;
}

function sanitize($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
        "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
        "—", "–", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}

function cities()
{
    $txt = explode(',', file_get_contents(base_path().'/city.txt'));
    $cities = [null => 'Select City'];
    foreach($txt as $val){
        $val = trim($val);
        $cities[$val] = $val;
    }

    return $cities;
}