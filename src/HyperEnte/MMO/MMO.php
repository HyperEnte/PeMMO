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

		$this->getServer()->getCommandMap()->registerAll("MMO",
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
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["1", "10%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl2")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["2", "25%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl3")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["3", "50%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl4")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["4", "75%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl5")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["5", "100%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
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
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["1", "10%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl2")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["2", "25%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl3")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["3", "50%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl4")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["4", "75%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl5")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["5", "100%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
		}
	}
	public function giveCrafting(Player $player){
		$name = $player->getName();
		$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
		$array = (array)$c->get("$name");
		$array["crafting"] = (int)$array["crafting"]+1;
		$c->set("$name", $array);
		$c->save();
		if($array["crafting"] === $this->getConfig()->get("crafting.lvl1")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["1", "10%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
		}
		if($array["crafting"] === $this->getConfig()->get("crafting.lvl2")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["2", "25%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
		}
		if($array["crafting"] === $this->getConfig()->get("crafting.lvl3")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["3", "50%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
		}
		if($array["crafting"] === $this->getConfig()->get("crafting.lvl4")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["4", "75%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
		}
		if($array["crafting"] === $this->getConfig()->get("crafting.lvl5")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["5", "100%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
		}
	}
}