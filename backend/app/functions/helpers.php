<?php

function redirect($page)
{
    header("location: $page");
}

function dumper($data, bool $die = true)
{
    echo "<pre style='padding:5px;background:black;color:yellow'>";
    var_dump($data);
    echo "</pre>";

    if ($die) {
        die;
    }
}
