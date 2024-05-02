<?php

namespace m3fri\event;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerDropItemEvent;

class EventListener implements Listener {

	// Тут указывать айди блоков которые игрок не должен открывать в режиме креатива.
	private array $blockIds = [54, 16, 3];

	public function onInteract(PlayerInteractEvent $event): void
	{
		$player = $event->getPlayer();
		if ($player->isCreative()) {
			if (in_array($event->getBlock()->getId(), $this->blockIds)) {
				$event->setCancelled(true);
				$player->sendMessage("§cВ режиме креатива нельзя взаимодействовать с этим блоком!");
			}
		}
	}

	public function onDrop(PlayerDropItemEvent $event): void
	{
		$player = $event->getPlayer();
		if ($player->isCreative()) {
			$event->setCancelled(true);
			$player->sendMessage("§cВ режиме креатива нельзя выбрасывать вещи!");
		}
	}
}
