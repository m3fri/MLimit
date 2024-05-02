<?php

namespace m3fri;

use m3fri\event\EventListener;
use pocketmine\plugin\PluginBase;

class MLimit extends PluginBase {

	/**
	 * @throws \ReflectionException
	 */
	public function onEnable(): void
	{
		$this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
	}
}
