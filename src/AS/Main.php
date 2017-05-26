<?php

namespace AS;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;

class Main extends PluginBase{
  
  public $break;
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    $this->getLogger()->info("§aEnabling ByteAnticheat §e[Version 1.0]");
  }
  
  public function addWarning(Player $p){
    //TODO in next version
  }
  
  public static function getPrefix(){
    return "§l§dByteAC §r";
  }
}
