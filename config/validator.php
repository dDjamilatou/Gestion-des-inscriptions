<?php
function obligatoire(string $nameChamp, string $value, array &$errors, $sms="Champ obligatoire" ){
    if (empty($value)) {
        $errors[$nameChamp]=$sms;
    }
}

function validate(array $error):bool{
    return count($error) == 0;
}