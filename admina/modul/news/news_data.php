
<?php

include "../../inc/config.php";


$tes=$dtable->get("berita", "berita.id_berita", array('berita.username','berita.judul',"berita.id_berita"),"");


?>