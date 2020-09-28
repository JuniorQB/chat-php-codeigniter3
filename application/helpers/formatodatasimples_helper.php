<?php

if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
    if (! function_exists ( 'formatodatasimples' )) {
        //$data - valor
        //$tipo - 1 - Código para SQL / 2 - SQL para Código
        function formatodatasimples($data,$tipo) {
            $ci = & get_instance ();
            if($tipo ==1){
                $valor = new DateTime(str_replace('/', '-', $data));
                return   $valor->format('Y-m-d');
            }
            
            if($tipo ==2){
                $valor = new DateTime(str_replace('-', '/', $data));
                return  $valor->format('d/m/Y');
            }
        }
    }