<?php

namespace shuvo;

class shuvo
{
    
    /**
     * Photo Update System
     */
    public static function fileUpload($request,$field_name,$path,$data=NULL){

        if($request->hasFile($field_name)){
            $file = $request -> file($field_name);
            $unique_name = md5(time().rand()) . "." . $file ->getClientOriginalExtension();
            $file -> move(public_path($path),$unique_name);


            if(file_exists($path . $data) && $data != NULL){
                unlink($path . $data);
            }
            return $unique_name;
        }else{
            return $unique_name = $data;
        }

    }

    /**
     * make slug
     */
    public static function makeSlug($title){

        $lowerdata = strtolower($title);

        return str_replace(" ","-",$lowerdata);

    }

    /**
     * array to JSON Convert
     */
    public static function jsonEncode(array $arr){
        return json_encode($arr);
    }

    /**
     * JSON to array Convert
     */
    public static function jsonDecode(string $str,$type = false){
        return json_decode($str,$type);
    }

    /**
     * Random number generate
     */
    public static function randNum(){
        return rand();
    }

    /**
     * Unique name prefix
     */
    public static function uname($ext = ""){
        return md5(time().rand()) . "." . $ext;
    }

}