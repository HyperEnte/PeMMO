<?php

namespace HyperEnte\MMO;

use HyperEnte\MMO\commands\MMOCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\utils\Config;

class MMO extends PluginBase{

	public static $main;

	public function onEnable(){

		self::$main = $this;
		@mkdir($this->getDataFolder()."/MMOStats");
		$this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);

		$this->getServer()->getCommandMap()->registerAll("PeMMO",
		[
			new MMOCommand()
		]);
	}

	public static function getMain(): self{
		return self::$main;
	}

	public function giveMining(Player $player){
		$name = $player->getName();
		$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
		$array = (array)$c->get("$name");
		$array["mining"] = (int)$array["mining"]+1;
		$c->set("$name", $array);
		$c->save();
		if($array["mining"] === $this->getConfig()->get("mining.lvl1")){
			$player->sendMessage("§aYou are now Mining Level §e1§a. You have now a 10% Chance to get Double Ores");
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl2")){
			$player->sendMessage("§aYou are now Mining Level §e2§a. You have now a 25% Chance to get Double Ores");
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl3")){
			$player->sendMessage("§aYou are now Mining Level §e3§a. You have now a 50% Chance to get Double Ores");
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl4")){
			$player->sendMessage("§aYou are now Mining Level §e4§a. You have now a 75% Chance to get Double Ores");
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl5")){
			$player->sendMessage("§aYou are now Mining Level §e5§a. You have now a 100% Chance to get Double Ores");
		}
	}
	public function giveTree(Player $player){
		$name = $player->getName();
		$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
		$array = (array)$c->get("$name");
		$array["treecutting"] = (int)$array["treecutting"]+1;
		$c->set("$name", $array);
		$c->save();
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl1")){
			$player->sendMessage("§aYou are now Treecutting Level §e1§a. You have now a 10% Chance to get an apple");
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl2")){
			$player->sendMessage("§aYou are now Treecutting Level §e2§a. You have now a 25% Chance to get an apple");
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl3")){
			$player->sendMessage("§aYou are now Treecutting Level §e3§a. You have now a 50% Chance to get an apple");
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl4")){
			$player->sendMessage("§aYou are now Treecutting Level §e4§a. You have now a 75% Chance to get an apple");
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl5")){
			$player->sendMessage("§aYou are now Treecutting Level §e5§a. You have now a 100% Chance to get an apple");
		}
	}
}
