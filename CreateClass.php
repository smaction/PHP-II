<?php

interface MachineInterface{
   public function changePowerState();
   public function getPowerState();
   
}




abstract class electronics implements MachineInterface{
    
    protected $power;
    protected $display;
    protected $powerState = 'off';
    
    public function changePowerState (){
        if ($this->powerState = 'off'){ 
            $this->powerState = 'on';
        }
        else{        
            $this->powerState = 'off';
        }
        
    }
    
    public function getPowerState(){
        return $this->powerState;
    }
    
    public function getPower()  {
        return $this->power;    
    }
    
    public function setPower($type) {
        $this->power = $type;
    }
    
    public function getDisplay()  {
        return $this->display;
    }
    
    public function setDisplay($type) {
        $this->display = $type;
    }
    
    public function __construct($power,string $display){
        $this->display = $display;
        $this->power = $power;
    }
    
}


class television extends electronics{
    
    protected $screenSize;
    protected $inputs = 1;
    protected $volume = 5;

    
    public function increaseVolume(){
        if( $this->volume >= 10 ) {
            $this->volume = 10;
        }
        else{
            $this->volume = $this->volume +1;
        }
    }
    
    public function decreaseVolume(){
        if( $this->volume <= 0 ) {
            $this->volume = 0;
        }
        else{
            $this->volume = $this->volume -1;
        }
    }
    
    public function getScreenSize()  {
        return $this->screenSize;
    }
    
    public function getInputs()  {
        return $this->inputs;
    }
    
    public function setInputs($num) {
        $this->inputs = $num;
    }
    
    public function getVolume()  {
        return $this->volume;
    }
    
    public function __construct($power, $display,$screenSize){
        parent::__construct($power, $display);
        $this->screenSize = $screenSize;
    }
    
}

class smartphone extends electronics{
    
    protected $screenSize;
    protected $mediaVolume = 5;
    protected $volume = 5;
    protected $storage;
    protected $apps = array();
    
    public function increaseVolume(){
        if( $this->volume >= 10 ) {
            $this->volume = 10;
        }
        else{
            $this->volume = $this->volume +1;
        }
    }
    
    public function decreaseVolume(){
        if( $this->volume <= 0 ) {
            $this->volume = 0;
        }
        else{
            $this->volume = $this->volume -1;
        }
    }
    
    public function increaseMediaVolume(){
        if( $this->mediaVolume >= 10 ) {
            $this->mediaVolume = 10;
        }
        else{
            $this->mediaVolume = $this->mediaVolume +1;
        }
    }
    
    public function decreaseMediaVolume(){
        if( $this->mediaVolume <= 0 ) {
            $this->mediaVolume = 0;
        }
        else{
            $this->mediaVolume = $this->mediaVolume -1;
        }
    }
    
    public function getScreenSize()  {
        return $this->screenSize;
    }
    
    public function getStorage()  {
        return $this->storage;
    }
    
    public function getVolume()  {
        return $this->volume;
    }
    
    public function addApp($item){
        $this->apps[] = $item;
    }
    
    public function removeApp($item){
       array_splice($this->apps, array_search($item, $this->apps),1);
    }
    
    public function getApps(){
       return $this->apps;
    }
    
    public function __construct($power, $display,$screenSize, $storage){
        parent::__construct($power, $display);
        $this->screenSize = $screenSize;
        $this->storage = $storage;
    }
    
}

/* $device = new electronics('AC', 'digital');

echo $device->getPower();
echo '<BR>';
echo $device->getPowerState(); */

$set = new television('AC', 'LCD', 32);
echo '<BR>';
$power =  $set->getPowerState();
echo $power;
echo '<BR>';
$volume = $set->getVolume();
echo $volume;
echo '<BR>';
$set->increaseVolume();
$volume = $set->getVolume();
echo $volume;
echo '<BR>';

$phone = new smartphone('AC','OLED',4.5, 64);
echo $phone->getScreenSize();
echo '<BR>';
echo $phone->getDisplay();
