<?php
    function dateformatindo($tanggal){
        $explode = explode('-', $tanggal);
        return $explode[2].'/'.$explode['1'].'/'.$explode[0];
    }
?>