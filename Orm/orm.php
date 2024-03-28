<?php
function jsonToArray($key=null)
{
    $objet=file_get_contents('../Json/data.json');
   $tableau=json_decode( $objet, true);

    return  $key==null?$tableau:$tableau[$key];
}

function arrayToJson(array $newDemande, string $key ){
    $tableau=jsonToArray();
    $tableau[$key][]=$newDemande;
   $transform=json_encode($tableau);
  file_put_contents("../Json/data.json",$transform);
}