<?php

namespace AS;

use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;

class EventListener implements Listener{
  /** var Main $plugin */
  public $plugin;

  public $break;
  
  public function __construct(Main $plugin){
    $this->plugin = $plugin;
  }

  public function onFastBreak(BlockBreakEvent $event){
    $player = $event->getPlayer();
    $block = $event->getBlock();
    $time = $this->break[strtolower($player->getName())][0];
    if (isset($this->break[strtolower($player->getName())])) {
        $time = $this->break[strtolower($player->getName())][0];
        $oldbreak = $this->break[strtolower($player->getName())][1];
        if ($block == $oldbreak || $this->getServer()->getTick() - 11 < $time) {
          $timeinsec = $time * 20;
           //Check for enchantments in next version
               $player->sendMessage($this->getPrefix() . "§cDetected SpeedMine (Time in seconds $timeinsec)");
                $event->setCancelled();
                return false;
            }
            $this->break[strtolower($player->getName())] = array($this->getServer()->getTick(), $block);
            return true;
        }
        $this->break[strtolower($player->getName())] = array($this->getServer()->getTick(), $block);
        return true;
    }
  
}
