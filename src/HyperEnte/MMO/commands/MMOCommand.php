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
		$building = $info["building"];
		$mininglvl = $info["mininglvl"];
		$treelvl = $info["treecuttinglvl"];
		$craftinglvl = $info["craftinglvl"];
		$buildinglvl = $info["buildinglvl"];
		$msg = str_replace(["[MINING]", "[TREECUTTING]", "[CRAFTING]", "[BUILDING]", "[LINE]", "[PLAYER]", "[MININGLEVEL]", "[TREECUTTINGLEVEL]", "[CRAFTINGLEVEL]", "[BUILDINGLEVEL]"], [$mining, $tree, $crafting, $building, "\n", $name, $mininglvl, $treelvl, $craftinglvl, $buildinglvl], MMO::getMain()->getConfig()->get("seestats.message"));
		$sender->sendMessage($msg);
		return false;
	}

}