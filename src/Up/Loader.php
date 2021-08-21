<?php

namespace Up;

use pocketmine\Player;
use pocketmine\block\Block;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};

class Loader extends PluginBase {
  
  public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args): bool {
    if(strtolower($cmd->getName()) === "up"){
      if(empty($args[0])){
        $sender->sendMessage("§cUsage: /up <height>");
        return true;
      }
      $x = $sender->getX();
      $y = $sender->getY();
      $z = $sender->getZ();
      $level = $sender->getLevel();
      $level->setBlock(new Vector3($x, $y + $args[0] - 1, $z), Block::get(20));
      $sender->teleport(new Vector3($x, $y + $args[0], $z));
      $sender->sendMessage("you raised §b$args[0] §7blocks");
    }
  }
  
}
