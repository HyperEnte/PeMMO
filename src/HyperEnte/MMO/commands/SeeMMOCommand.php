<?php

namespace HyperEnte\MMO\commands;

use HyperEnte\MMO\MMO;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;


class SeeMMOCommand extends PluginCommand {

	public function __construct(){
		parent::__construct("seemmo", MMO::getMain());
		$this->setDescription("See someone elses MMO Stats");
		$this->setPermission("pemmo.cmd.seemmo");
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){

		if(!$sender instanceof Player) return true;

		if(!$sender->hasPermission("cmd.seemmo")){
			$sender->sendMessage(MMO::getMain()->getConfig()->get("noperm"));
			return true;
		}

		if(empty($args)){
			$sender->sendMessage(MMO::getMain()->getConfig()->get("define.player"));
			return false;
		}

		$player = MMO::getMain()->getServer()->getPlayer($args[0]);
		$name = $player->getName();
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
