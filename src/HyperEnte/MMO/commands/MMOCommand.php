<?php

namespace HyperEnte\MMO\commands;

use HyperEnte\MMO\MMO;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\utils\Config;

class MMOCommand extends PluginCommand{

	public function __construct(){
		parent::__construct("mmo", MMO::getMain());
		$this->setDescription("See your MMO Stats");
		$this->setPermission("cmd.mmo");
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){

		if(!$sender instanceof Player) return true;
		$name = $sender->getName();
		$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
		$info = $c->get("$name");
		$mining = $info["mining"];
		$tree = $info["treecutting"];
		$crafting = $info["crafting"];
		$msg = str_replace(["[MINING]", "[TREECUTTING]", "[CRAFTING]", "[LINE]"], [$mining, $tree, $crafting, "\n"], MMO::getMain()->getConfig()->get("stats.message"));
		$sender->sendMessage($msg);
		return false;
	}

}