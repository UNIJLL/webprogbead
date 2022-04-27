<?php
class video
{
	// public function __construct() 
    // {
    //     $this->db = getInstance("db");
	// }

    public function getYoutubeIDFromUrl($url)
    {
        if (strpos($url, 'watch?v=') !== false) $info = explode('watch?v=', $url);
        if (strpos($url, '/youtu.be/') !== false) $info = explode('/youtu.be/', $url);
        if (strpos($url, '/embed/')  !== false) $info = explode('/embed/', $url);
        if (!isset($info)) trigger_error('GetYoutubeIDFromUrl sikertelen: '.$url, E_USER_ERROR);
        return end($info);
    }
    
    // 0 - full res, 1-3 low res index pictures
    public function getYoutubeIndexPictureUrlFromVideoUrl($url, $index)
    {
        return "https://img.youtube.com/vi/".$this->getYoutubeIDFromUrl($url)."/$index.jpg";
    }
    
    public function getYoutubeEmbedUrl($url)
    {
        return 'https://www.youtube.com/embed/'.$this->getYoutubeIDFromUrl($url);
    }
    
    public function getYoutubeIframeTag($url, $width = 640, $height = 360)
    {
        return '<iframe width="'.$width.'" height="'.$height.'" src="'.$this->getYoutubeEmbedUrl($url).'" frameborder="0" allowfullscreen></iframe>';
    }
    
    public function getYoutubeIframeTagWidthPercent($url, $widthPercent = 90)
    {
        return '
            <style>    
            .videocontainer {
                position: relative;
                width: '.$widthPercent.'%;
                height: 0;
                padding-bottom: '.$widthPercent*0.5625.'%;
                margin: auto;
            }
            .video {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            </style>    
            <div class="videocontainer">
            <iframe src="'.$this->getYoutubeEmbedUrl($url).'" frameborder="0" class="video" allowfullscreen></iframe>
            </div>';
    }
   
}
