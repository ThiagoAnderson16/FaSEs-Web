<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author 033832151635
 */
class Util {
    static $COORDENADOR = 4;
    static $PROFESSOR = 3;
    static $ALUNO = 2;
    static $CLIENTE = 1;
    
    public static function permissao($nivel){
        
        //return $_SESSION['USER']['PAPEL']['ID'] <= $nivel ? true : false;
        
        return Util::$COORDENADOR >= $nivel ? true : false;
        
    }
    
    /*
         if(Util::permissao(1)){ 
    }*/
    
}
