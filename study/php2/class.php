<?php
/**
 * Created by PhpStorm.
 * User: Norse
 * Date: 2017/7/24
 * Time: 17:38
 */
class Read{//f1a9.php
    public $file;
    public $data;
    public $name;
    public function __toString(){
        if(isset($this->file)){
            echo file_get_contents($this->file);
            file_put_contents($this->name,$this->data);
        }
        return "__toString was called!";
    }
}
//$c=new Read();
//$c->file="index.php";
//print_r(serialize($c));