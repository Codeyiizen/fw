<?php
    $data = html_entity_decode(!empty($hometext->homepage_content) ? $hometext->homepage_content : '' );
    echo $data;
?>