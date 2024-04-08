<?php
    $data = html_entity_decode(!empty($aboutUsText->aboutus_content) ? $aboutUsText->aboutus_content :'');
    echo $data;
?>