<?php

namespace HyperEnte\MMO;

use pocketmine\block\Block;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\inventory\CraftItemEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\block\BlockBreakEvent;

class EventListener implements Listener{

	public function onJoin(PlayerJoinEvent $event){

		$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
		$name = $event->getPlayer()->getName();
		if($c->get($name) == false) {
			$c->set("$name", ["mining" => 0, "mininglvl" => 0, "treecutting" => 0, "treecuttinglvl" =>0, "crafting" => 0, "craftinglvl" => 0, "building" => 0, "buildinglvl" => 0]);
			$c->save();
		}

	}

	public function onBreak(BlockBreakEvent $event){
		$name = $event->getPlayer()->getName();
		if(!$event->isCancelled()){
			if($event->getBlock()->getId() === Block::STONE || $event->getBlock()->getId() === Block::COAL_ORE || $event->getBlock()->getId() === Block::IRON_ORE || $event->getBlock()->getId() === Block::GOLD_ORE || $event->getBlock()->getId() === Block::LAPIS_ORE || $event->getBlock()->getId() === Block::REDSTONE_ORE || $event->getBlock()->getId() === Block::DIAMOND_ORE || $event->getBlock()->getId() === Block::EMERALD_ORE || $event->getBlock()->getId() === Block::OBSIDIAN || $event->getBlock()->getId() === Block::QUARTZ_ORE){
				MMO::getMain()->giveMining($event->getPlayer());
				$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
				$info = $c->get("$name");
				if($info["mininglvl"] === 1){
					$percent = MMO::getMain()->getConfig()->get("mining.lvl1.percent") * 10;
					if(mt_rand(1, 1000) % $percent <= 0){
							if($event->getBlock()->getId() === Block::STONE) {
								$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("stone.id"), MMO::getMain()->getConfig()->get("stone.meta"), MMO::getMain()->getConfig()->get("stone.amount"))]);
							}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("cobblestone.id"), MMO::getMain()->getConfig()->get("cobblestone.meta"), MMO::getMain()->getConfig()->get("cobblestone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("coal.id"), MMO::getMain()->getConfig()->get("coal.meta"), MMO::getMain()->getConfig()->get("coal.amount"))]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("iron.id"), MMO::getMain()->getConfig()->get("iron.meta"), MMO::getMain()->getConfig()->get("iron.amount"))]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("gold.id"), MMO::getMain()->getConfig()->get("gold.meta"), MMO::getMain()->getConfig()->get("gold.amount"))]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("lapis.id"), MMO::getMain()->getConfig()->get("lapis.meta"), MMO::getMain()->getConfig()->get("lapis.amount"))]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("redstone.id"), MMO::getMain()->getConfig()->get("redstone.meta"), MMO::getMain()->getConfig()->get("redstone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("diamond.id"), MMO::getMain()->getConfig()->get("diamond.meta"), MMO::getMain()->getConfig()->get("diamond.amount"))]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("emerald.id"), MMO::getMain()->getConfig()->get("emerald.meta"), MMO::getMain()->getConfig()->get("emerald.amount"))]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("obsidian.id"), MMO::getMain()->getConfig()->get("obsidian.meta"), MMO::getMain()->getConfig()->get("obsidian.amount"))]);
						}
					}
				}
				if($info["mininglvl"] === 2){
					$percent = MMO::getMain()->getConfig()->get("mining.lvl2.percent") * 10;
					if(mt_rand(1, 1000) % $percent <= 0){
						if($event->getBlock()->getId() === Block::STONE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("stone.id"), MMO::getMain()->getConfig()->get("stone.meta"), MMO::getMain()->getConfig()->get("stone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("cobblestone.id"), MMO::getMain()->getConfig()->get("cobblestone.meta"), MMO::getMain()->getConfig()->get("cobblestone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("coal.id"), MMO::getMain()->getConfig()->get("coal.meta"), MMO::getMain()->getConfig()->get("coal.amount"))]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("iron.id"), MMO::getMain()->getConfig()->get("iron.meta"), MMO::getMain()->getConfig()->get("iron.amount"))]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("gold.id"), MMO::getMain()->getConfig()->get("gold.meta"), MMO::getMain()->getConfig()->get("gold.amount"))]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("lapis.id"), MMO::getMain()->getConfig()->get("lapis.meta"), MMO::getMain()->getConfig()->get("lapis.amount"))]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("redstone.id"), MMO::getMain()->getConfig()->get("redstone.meta"), MMO::getMain()->getConfig()->get("redstone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("diamond.id"), MMO::getMain()->getConfig()->get("diamond.meta"), MMO::getMain()->getConfig()->get("diamond.amount"))]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("emerald.id"), MMO::getMain()->getConfig()->get("emerald.meta"), MMO::getMain()->getConfig()->get("emerald.amount"))]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("obsidian.id"), MMO::getMain()->getConfig()->get("obsidian.meta"), MMO::getMain()->getConfig()->get("obsidian.amount"))]);
						}
					}
				}
				if($info["mininglvl"] === 3){
					$percent = MMO::getMain()->getConfig()->get("mining.lvl3.percent") * 10;
					if(mt_rand(1, 1000) % $percent <= 0){
						if($event->getBlock()->getId() === Block::STONE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("stone.id"), MMO::getMain()->getConfig()->get("stone.meta"), MMO::getMain()->getConfig()->get("stone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("cobblestone.id"), MMO::getMain()->getConfig()->get("cobblestone.meta"), MMO::getMain()->getConfig()->get("cobblestone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("coal.id"), MMO::getMain()->getConfig()->get("coal.meta"), MMO::getMain()->getConfig()->get("coal.amount"))]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("iron.id"), MMO::getMain()->getConfig()->get("iron.meta"), MMO::getMain()->getConfig()->get("iron.amount"))]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("gold.id"), MMO::getMain()->getConfig()->get("gold.meta"), MMO::getMain()->getConfig()->get("gold.amount"))]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("lapis.id"), MMO::getMain()->getConfig()->get("lapis.meta"), MMO::getMain()->getConfig()->get("lapis.amount"))]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("redstone.id"), MMO::getMain()->getConfig()->get("redstone.meta"), MMO::getMain()->getConfig()->get("redstone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("diamond.id"), MMO::getMain()->getConfig()->get("diamond.meta"), MMO::getMain()->getConfig()->get("diamond.amount"))]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("emerald.id"), MMO::getMain()->getConfig()->get("emerald.meta"), MMO::getMain()->getConfig()->get("emerald.amount"))]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("obsidian.id"), MMO::getMain()->getConfig()->get("obsidian.meta"), MMO::getMain()->getConfig()->get("obsidian.amount"))]);
						}
					}
				}
				if($info["mininglvl"] === 4){
					$percent = MMO::getMain()->getConfig()->get("mining.lvl4.percent") * 10;
					if(mt_rand(1, 1000) % $percent <= 0){
						if($event->getBlock()->getId() === Block::STONE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("stone.id"), MMO::getMain()->getConfig()->get("stone.meta"), MMO::getMain()->getConfig()->get("stone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("cobblestone.id"), MMO::getMain()->getConfig()->get("cobblestone.meta"), MMO::getMain()->getConfig()->get("cobblestone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("coal.id"), MMO::getMain()->getConfig()->get("coal.meta"), MMO::getMain()->getConfig()->get("coal.amount"))]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("iron.id"), MMO::getMain()->getConfig()->get("iron.meta"), MMO::getMain()->getConfig()->get("iron.amount"))]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("gold.id"), MMO::getMain()->getConfig()->get("gold.meta"), MMO::getMain()->getConfig()->get("gold.amount"))]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("lapis.id"), MMO::getMain()->getConfig()->get("lapis.meta"), MMO::getMain()->getConfig()->get("lapis.amount"))]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("redstone.id"), MMO::getMain()->getConfig()->get("redstone.meta"), MMO::getMain()->getConfig()->get("redstone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("diamond.id"), MMO::getMain()->getConfig()->get("diamond.meta"), MMO::getMain()->getConfig()->get("diamond.amount"))]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("emerald.id"), MMO::getMain()->getConfig()->get("emerald.meta"), MMO::getMain()->getConfig()->get("emerald.amount"))]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("obsidian.id"), MMO::getMain()->getConfig()->get("obsidian.meta"), MMO::getMain()->getConfig()->get("obsidian.amount"))]);
						}
					}
				}
				if($info["mininglvl"] === 5) {
					$percent = MMO::getMain()->getConfig()->get("mining.lvl5.percent") * 10;
					if (mt_rand(1, 1000) % $percent <= 0) {
						if($event->getBlock()->getId() === Block::STONE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("stone.id"), MMO::getMain()->getConfig()->get("stone.meta"), MMO::getMain()->getConfig()->get("stone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("cobblestone.id"), MMO::getMain()->getConfig()->get("cobblestone.meta"), MMO::getMain()->getConfig()->get("cobblestone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("coal.id"), MMO::getMain()->getConfig()->get("coal.meta"), MMO::getMain()->getConfig()->get("coal.amount"))]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("iron.id"), MMO::getMain()->getConfig()->get("iron.meta"), MMO::getMain()->getConfig()->get("iron.amount"))]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("gold.id"), MMO::getMain()->getConfig()->get("gold.meta"), MMO::getMain()->getConfig()->get("gold.amount"))]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("lapis.id"), MMO::getMain()->getConfig()->get("lapis.meta"), MMO::getMain()->getConfig()->get("lapis.amount"))]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("redstone.id"), MMO::getMain()->getConfig()->get("redstone.meta"), MMO::getMain()->getConfig()->get("redstone.amount"))]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("diamond.id"), MMO::getMain()->getConfig()->get("diamond.meta"), MMO::getMain()->getConfig()->get("diamond.amount"))]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("emerald.id"), MMO::getMain()->getConfig()->get("emerald.meta"), MMO::getMain()->getConfig()->get("emerald.amount"))]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("obsidian.id"), MMO::getMain()->getConfig()->get("obsidian.meta"), MMO::getMain()->getConfig()->get("obsidian.amount"))]);
						}
					}
				}
			}
			if($event->getBlock()->getId() === Block::WOOD || $event->getBlock()->getId() === Block::WOOD2){
				MMO::getMain()->giveTree($event->getPlayer());
				$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
				$info = $c->get("$name");
				if($info["treecuttinglvl"] === 1){
					$percent = MMO::getMain()->getConfig()->get("treecutting.lvl1.percent") * 10;
					if(mt_rand(1, 1000) % $percent <= 0){
						if($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
						if($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
					}
				}
				if($info["treecuttinglvl"] === 2){
					$percent = MMO::getMain()->getConfig()->get("treecutting.lvl2.percent") * 10;
					if(mt_rand(1, 1000) % $percent <= 0){
						if($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
						if($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
					}
				}
				if($info["treecuttinglvl"] === 3){
					$percent = MMO::getMain()->getConfig()->get("treecutting.lvl3.percent") * 10;
					if(mt_rand(1, 1000) % $percent <= 0){
						if($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
						if($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
					}
				}
				if($info["treecuttinglvl"] === 4){
					$percent = MMO::getMain()->getConfig()->get("treecutting.lvl4.percent") * 10;
					if(mt_rand(1, 1000) % $percent <= 0){
						if($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
						if($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
					}
				}
				if($info["treecuttinglvl"] === 5){
					$percent = MMO::getMain()->getConfig()->get("treecutting.lvl5.percent") * 10;
					if(mt_rand(1, 1000) % $percent <= 0) {
						if ($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
						if ($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(MMO::getMain()->getConfig()->get("treecutting.reward.item"))]);
						}
					}
				}
			}
		}
	}

	public function onCraft(CraftItemEvent $event){

		$player = $event->getPlayer();
		$name = $player->getName();
		MMO::getMain()->giveCrafting($event->getPlayer());
		$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
		$info = $c->get("$name");
		if($info["craftinglvl"] === 1){
			$percent = MMO::getMain()->getConfig()->get("crafting.lvl1.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
		if($info["craftinglvl"] === 2){
			$percent = MMO::getMain()->getConfig()->get("crafting.lvl2.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
		if($info["craftinglvl"] === 3){
			$percent = MMO::getMain()->getConfig()->get("crafting.lvl3.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
		if($info["crafting"] === 4){
			$percent = MMO::getMain()->getConfig()->get("crafting.lvl4.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
		if($info["crafting"] === 5){
			$percent = MMO::getMain()->getConfig()->get("crafting.lvl5.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
	}

	public function onBuild(BlockPlaceEvent $event){

		$player = $event->getPlayer();
		$name = $player->getName();
		MMO::getMain()->giveCrafting($event->getPlayer());
		$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
		$info = $c->get("$name");
		if($info["buildinglvl"] === 1){
			$percent = MMO::getMain()->getConfig()->get("building.lvl1.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("building.reward.item")));
			}
		}
		if($info["buildinglvl"] === 2){
			$percent = MMO::getMain()->getConfig()->get("building.lvl2.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("building.reward.item")));
			}
		}
		if($info["buildinglvl"] === 3){
			$percent = MMO::getMain()->getConfig()->get("building.lvl3.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("building.reward.item")));
			}
		}
		if($info["buildinglvl"] === 4){
			$percent = MMO::getMain()->getConfig()->get("building.lvl4.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("building.reward.item")));
			}
		}
		if($info["buildinglvl"] === 5){
			$percent = MMO::getMain()->getConfig()->get("building.lvl5.percent") * 10;
			if(mt_rand(1, 1000) % $percent <= 0) {
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("building.reward.item")));
			}
		}
	}

}