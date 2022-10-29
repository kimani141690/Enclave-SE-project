<?php

function tag_to_arr($tags)
{
    if($tags==""){
        return [];
    }
    return explode(',', $tags);
}

function build_tags($tags, $site = 'talent.php')
{
    $tag_arr = tag_to_arr($tags);
    if (sizeof($tag_arr) > 0) {


        $html = "";
        foreach ($tag_arr as $tag) {
            $tag = ucfirst($tag);
            $html = $html . "<a href='$site?tag=$tag'><p class='tag-container'>$tag</p></a>";
        }
        return $html;
    }
    else{
        return "";
    }
}
