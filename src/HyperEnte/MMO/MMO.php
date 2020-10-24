<?php

namespace HyperEnte\MMO;

use HyperEnte\MMO\commands\MMOCommand;
use HyperEnte\MMO\commands\SeeMMOCommand;
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
			new MMOCommand(),
			new SeeMMOCommand()
		]);

		if($this->getConfig()->get("version") !== "0.1.2"){

			$this->updateConfig();

		}
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
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["1", $this->getConfig()->get("mining.lvl1.percent")."%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
			$array["mininglvl"] = (int)$array["mininglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl2")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["2", $this->getConfig()->get("mining.lvl2.percent")."%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
			$array["mininglvl"] = (int)$array["mininglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl3")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["3", $this->getConfig()->get("mining.lvl3.percent")."%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
			$array["mininglvl"] = (int)$array["mininglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl4")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["4", $this->getConfig()->get("mining.lvl4.percent")."%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
			$array["mininglvl"] = (int)$array["mininglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["mining"] === $this->getConfig()->get("mining.lvl5")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["5", $this->getConfig()->get("mining.lvl5.percent")."%"], $this->getConfig()->get("levelup.mining"));
			$player->sendMessage($lvlmsg);
			$array["mininglvl"] = (int)$array["mininglvl"]+1;
			$c->set("$name", $array);
			$c->save();
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
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["1", $this->getConfig()->get("treecutting.lvl1.percent")."%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
			$array["treecuttinglvl"] = (int)$array["treecuttinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl2")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["2", $this->getConfig()->get("treecutting.lvl2.percent")."%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
			$array["treecuttinglvl"] = (int)$array["treecuttinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl3")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["3", $this->getConfig()->get("treecutting.lvl3.percent")."%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
			$array["treecuttinglvl"] = (int)$array["treecuttinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl4")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["4", $this->getConfig()->get("treecutting.lvl4.percent")."%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
			$array["treecuttinglvl"] = (int)$array["treecuttinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["treecutting"] === $this->getConfig()->get("treecutting.lvl5")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["5", $this->getConfig()->get("treecutting.lvl5.percent")."%"], $this->getConfig()->get("levelup.treecutting"));
			$player->sendMessage($lvlmsg);
			$array["treecuttinglvl"] = (int)$array["treecuttinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
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
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["1", $this->getConfig()->get("crafting.lvl1.percent")."%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
			$array["craftinglvl"] = (int)$array["craftinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["crafting"] === $this->getConfig()->get("crafting.lvl2")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["2", $this->getConfig()->get("crafting.lvl2.percent")."%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
			$array["craftinglvl"] = (int)$array["craftinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["crafting"] === $this->getConfig()->get("crafting.lvl3")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["3", $this->getConfig()->get("crafting.lvl3.percent")."%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
			$array["craftinglvl"] = (int)$array["craftinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["crafting"] === $this->getConfig()->get("crafting.lvl4")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["4", $this->getConfig()->get("crafting.lvl4.percent")."%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
			$array["craftinglvl"] = (int)$array["craftinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["crafting"] === $this->getConfig()->get("crafting.lvl5")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["5", $this->getConfig()->get("crafting.lvl5.percent")."%"], $this->getConfig()->get("levelup.crafting"));
			$player->sendMessage($lvlmsg);
			$array["craftinglvl"] = (int)$array["craftinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
	}

	public function giveBuilding(Player $player){
		$name = $player->getName();
		$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
		$array = (array)$c->get("$name");
		$array["building"] = (int)$array["building"]+1;
		$c->set("$name", $array);
		$c->save();
		if($array["building"] === $this->getConfig()->get("building.lvl1")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["1", $this->getConfig()->get("building.lvl1.percent")."%"], $this->getConfig()->get("levelup.building"));
			$player->sendMessage($lvlmsg);
			$array["buildinglvl"] = (int)$array["buildinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["building"] === $this->getConfig()->get("building.lvl2")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["2", $this->getConfig()->get("building.lvl2.percent")."%"], $this->getConfig()->get("levelup.building"));
			$player->sendMessage($lvlmsg);
			$array["buildinglvl"] = (int)$array["buildinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["building"] === $this->getConfig()->get("building.lvl3")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["3", $this->getConfig()->get("building.lvl3.percent")."%"], $this->getConfig()->get("levelup.building"));
			$player->sendMessage($lvlmsg);
			$array["buildinglvl"] = (int)$array["buildinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["building"] === $this->getConfig()->get("building.lvl4")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["4", $this->getConfig()->get("building.lvl4.percent")."%"], $this->getConfig()->get("levelup.building"));
			$player->sendMessage($lvlmsg);
			$array["buildinglvl"] = (int)$array["buildinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
		if($array["building"] === $this->getConfig()->get("building.lvl5")){
			$lvlmsg = str_replace(["[LEVEL]", "[LEVELPERCENT]"], ["5", $this->getConfig()->get("building.lvl5.percent")."%"], $this->getConfig()->get("levelup.building"));
			$player->sendMessage($lvlmsg);
			$array["buildinglvl"] = (int)$array["buildinglvl"]+1;
			$c->set("$name", $array);
			$c->save();
		}
	}

	public function updateConfig(){
		if (file_exists($this->getDataFolder() . "config.yml")) {
				$this->getLogger()->info("Your config was outdated");
				rename($this->getDataFolder() . "config.yml", "config-old.yml");
				$this->saveResource("config.yml");
			}
			$this->saveResource("config.yml");
		if (file_exists(MMO::getMain()->getDataFolder()."/MMOStats/" . "mmo.json")) {
			$this->getLogger()->info("Your savefile was outdated");
			rename($this->getDataFolder() . "mmo.json", "mmo-old.json");
			$this->saveResource("mmo.json");
		}
	}
}