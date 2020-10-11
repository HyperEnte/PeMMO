<?php

namespace HyperEnte\MMO;

use pocketmine\block\Block;
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
			$c->set("$name", ["mining" => 0, "treecutting" => 0, "crafting" => 0]);
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
				if($info["mining"] >= MMO::getMain()->getConfig()->get("mining.lvl1") AND $info["mining"] <= MMO::getMain()->getConfig()->get("mining.lvl2")){
					if(mt_rand(1, 1000) % 100 <= 0){
							if($event->getBlock()->getId() === Block::STONE) {
								$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
							}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(Item::COAL, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(Item::IRON_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(Item::GOLD_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(Item::DYE, 4, 2)]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(Item::REDSTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(Item::DIAMOND, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(Item::EMERALD, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(Item::OBSIDIAN, 0, 2)]);
						}
					}
				}
				if($info["mining"] >= MMO::getMain()->getConfig()->get("mining.lvl2") AND $info["mining"] <= MMO::getMain()->getConfig()->get("mining.lvl3")){
					if(mt_rand(1, 1000) % 250 <= 0){
						if($event->getBlock()->getId() === Block::STONE) {
							$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(Item::COAL, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(Item::IRON_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(Item::GOLD_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(Item::DYE, 4, 2)]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(Item::REDSTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(Item::DIAMOND, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(Item::EMERALD, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(Item::OBSIDIAN, 0, 2)]);
						}
					}
				}
				if($info["mining"] >= MMO::getMain()->getConfig()->get("mining.lvl3") AND $info["mining"] <= MMO::getMain()->getConfig()->get("mining.lvl4")){
					if(mt_rand(1, 1000) % 500 <= 0){
						if($event->getBlock()->getId() === Block::STONE) {
							$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(Item::COAL, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(Item::IRON_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(Item::GOLD_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(Item::DYE, 4, 2)]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(Item::REDSTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(Item::DIAMOND, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(Item::EMERALD, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(Item::OBSIDIAN, 0, 2)]);
						}
					}
				}
				if($info["mining"] >= MMO::getMain()->getConfig()->get("mining.lvl4") AND $info["mining"] <= MMO::getMain()->getConfig()->get("mining.lvl5")){
					if(mt_rand(1, 1000) % 750 <= 0){
						if($event->getBlock()->getId() === Block::STONE) {
							$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(Item::COAL, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(Item::IRON_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(Item::GOLD_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(Item::DYE, 4, 2)]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(Item::REDSTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(Item::DIAMOND, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(Item::EMERALD, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(Item::OBSIDIAN, 0, 2)]);
						}
					}
				}
				if($info["mining"] >= MMO::getMain()->getConfig()->get("mining.lvl5")){
						if($event->getBlock()->getId() === Block::STONE) {
							$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::COBBLESTONE) {
							$event->setDrops([Item::get(Item::COBBLESTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::COAL_ORE) {
							$event->setDrops([Item::get(Item::COAL, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::IRON_ORE) {
							$event->setDrops([Item::get(Item::IRON_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::GOLD_ORE) {
							$event->setDrops([Item::get(Item::GOLD_INGOT, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::LAPIS_ORE) {
							$event->setDrops([Item::get(Item::DYE, 4, 2)]);
						}
						if($event->getBlock()->getId() === Block::REDSTONE_ORE) {
							$event->setDrops([Item::get(Item::REDSTONE, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::DIAMOND_ORE) {
							$event->setDrops([Item::get(Item::DIAMOND, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::EMERALD_ORE) {
							$event->setDrops([Item::get(Item::EMERALD, 0, 2)]);
						}
						if($event->getBlock()->getId() === Block::OBSIDIAN) {
							$event->setDrops([Item::get(Item::OBSIDIAN, 0, 2)]);
						}
				}
			}
			if($event->getBlock()->getId() === Block::WOOD || $event->getBlock()->getId() === Block::WOOD2){
				MMO::getMain()->giveTree($event->getPlayer());
				$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
				$info = $c->get("$name");
				if($info["treecutting"] >= MMO::getMain()->getConfig()->get("treecutting.lvl1") AND $info["treecutting"] <= MMO::getMain()->getConfig()->get("treecutting.lvl2")){
					if(mt_rand(1, 1000) % 100 <= 0){
						if($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1)]);
						}
						if($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1)]);
						}
					}
				}
				if($info["treecutting"] >= MMO::getMain()->getConfig()->get("treecutting.lvl2") AND $info["treecutting"] <= MMO::getMain()->getConfig()->get("treecutting.lvl3")){
					if(mt_rand(1, 1000) % 250 <= 0){
						if($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1)]);
						}
						if($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1)]);
						}
					}
				}
				if($info["treecutting"] >= MMO::getMain()->getConfig()->get("treecutting.lvl3") AND $info["treecutting"] <= MMO::getMain()->getConfig()->get("treecutting.lvl4")){
					if(mt_rand(1, 1000) % 500 <= 0){
						if($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1)]);
						}
						if($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1)]);
						}
					}
				}
				if($info["treecutting"] >= MMO::getMain()->getConfig()->get("treecutting.lvl4") AND $info["treecutting"] <= MMO::getMain()->getConfig()->get("treecutting.lvl5")){
					if(mt_rand(1, 1000) % 750 <= 0){
						if($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1)]);
						}
						if($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1)]);
						}
					}
				}
				if($info["treecutting"] >= MMO::getMain()->getConfig()->get("treecutting.lvl5")){
						if($event->getBlock()->getId() === Block::WOOD) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1), Item::get(Item::WOOD)]);
						}
						if($event->getBlock()->getId() === Block::WOOD2) {
							$event->setDrops([Item::get(Item::APPLE, 0, 1), Item::get(Item::WOOD2)]);
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
		if($info["crafting"] >= MMO::getMain()->getConfig()->get("crafting.lvl1") AND $info["crafting"] <= MMO::getMain()->getConfig()->get("crafting.lvl2")){
			if(mt_rand(1, 1000) % 50 <= 0){
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
		if($info["crafting"] >= MMO::getMain()->getConfig()->get("crafting.lvl2") AND $info["crafting"] <= MMO::getMain()->getConfig()->get("crafting.lvl3")){
			if(mt_rand(1, 1000) % 100 <= 0){
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
		if($info["crafting"] >= MMO::getMain()->getConfig()->get("crafting.lvl3") AND $info["crafting"] <= MMO::getMain()->getConfig()->get("crafting.lvl4")){
			if(mt_rand(1, 1000) % 200 <= 0){
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
		if($info["crafting"] >= MMO::getMain()->getConfig()->get("crafting.lvl4") AND $info["crafting"] <= MMO::getMain()->getConfig()->get("crafting.lvl5")){
			if(mt_rand(1, 1000) % 300 <= 0){
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
		if($info["crafting"] >= MMO::getMain()->getConfig()->get("crafting.lvl5")){
			if(mt_rand(1, 1000) % 400 <= 0){
				$player->getInventory()->addItem(Item::get(MMO::getMain()->getConfig()->get("crafting.reward.item")));
			}
		}
	}

}
