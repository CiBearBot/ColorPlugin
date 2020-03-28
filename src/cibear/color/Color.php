<?php

namespace cibear\color;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;

use onebone\economyapi\EconomyAPI;
use jojoe77777\FormAPI;

Class Color extends PluginBase{

public $p = "§a➢ ";
    
    public function onEnable(){
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		$this->getLogger()->info("§2https://github.com/CiBearBot/ColorPlugin");
		}
		
	public function onDisable(){
		$this->getLogger()->info("§4https://github.com/CiBearBot/ColorPlugin");
		}
    
    public function onCommand(CommandSender $sender, Command $command, String $label, array $args) : bool {
      if($command->getName() === "color"){
        $player = $sender;
        $this->FormColor($player);
      }
      return true;
    }
    
    public function FormColor($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			$result = $data;
			if($result === null){
				return true;
				}
				switch($result){
					case "0";
					$this->GenderForm($player);
					break;
					
					case "1";
					$this->CognomenForm($player);
					break;
					
					case "2";
					$this->AgeForm($player);
					break;
				}
		});
			$form->setTitle("Color");
			$form->addButton("Gender\n§rเพศ");
			$form->addButton("Cognomen\n§rฉายา");
			$form->addButton("Age\n§rอายุ");
			$form->sendToPlayer($player);
			return $form;
		}
	
	public function GenderForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			$result = $data;
			if($result === null){
				return true;
				}
				switch($result){
					case "0";
						if($player instanceof Player){
						$player->sendMessage($this->p . "§fคุณได้เลือกเพศ ชาย เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setPrefix("§b♂︎", $player);
						return true;
					}
					
					case "1";
					if($player instanceof Player){
						$player->sendMessage($this->p . "§fคุณได้เลือกเพศ  หญิง เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setPrefix("§d♀", $player);
						return true;
					}
					
					case "2";
					if($player instanceof Player){
						$player->sendMessage($this->p . "§fคุณได้เลือกเพศ  ไม่เผยเพศ  เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setPrefix("§e⚤", $player);
						return true;
						}
					}
			});
			$form->setTitle("Gender");
			$form->addButton("เพศชาย");
			$form->addButton("เพศหญิง");
			$form->addButton("ไม่เผยเพศ");
			$form->sendToPlayer($player);
	}
	
	public function CognomenForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			$result = $data;
			if($result === null){
				return true;
				}
				switch($result){
					case "0";
					if($player instanceof Player){
						$name = $player->getName();
						$player->sendMessage($this->p . "§fรับฉายา สายฟรี เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setSuffix("§eสายฟรี", $player);
						return true;
					}
					case "1";
					if($player instanceof Player){
						$name = $player->getName();
						$economy = EconomyAPI::getInstance();
						$mymoney = $economy->myMoney($player);
						if($mymoney >= 300000){
						$economy->reduceMoney($player, 300000);
						$player->sendMessage($this->p . "§fรับฉายา น่ารัก เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setSuffix("§dน่§fา§dรั§fก", $player);
						} else {
						    $player->sendMessage("เงินไม่พอ");
						}
						return true;
					}
					case "2";
					if($player instanceof Player){
						$name = $player->getName();
						$economy = EconomyAPI::getInstance();
						$mymoney = $economy->myMoney($player);
						if($mymoney >= 300000){
						$economy->reduceMoney($player, 300000);
						$player->sendMessage($this->p . "§fรับฉายา พี่หล่อนะ เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setSuffix("§aพี่§cหล่อ§fนะ", $player);
						} else {
						    $player->sendMessage("เงินไม่พอ");
						}
						return true;
					}
					case "3";
					if($player instanceof Player){
						$name = $player->getName();
						$config = new Config($this->getDataFolder() . "data/" . strtolower($player->getName()) . ".yml", Config::YAML);
						$economy = EconomyAPI::getInstance();
						$mymoney = $economy->myMoney($player);
						if($mymoney >= 300000){
						$economy->reduceMoney($player, 300000);
						$player->sendMessage($this->p . "§fรับฉายา สาวY เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setSuffix("§fสาว§5Y", $player);
						} else {
						    $player->sendMessage("เงินไม่พอ");
						}
						return true;
						}
						case "4";
					if($player instanceof Player){
						$name = $player->getName();
						$economy = EconomyAPI::getInstance();
						$mymoney = $economy->myMoney($player);
						if($mymoney >= 300000){
						$economy->reduceMoney($player, 300000);
						$player->sendMessage($this->p . "§fรับฉายา โรตีดิบ เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setSuffix("§eโรตี§6ดิบ", $player);
						} else {
						    $player->sendMessage("เงินไม่พอ");
						}
						return true;
					}
					case "5";
					if($player instanceof Player){
						$name = $player->getName();
						$economy = EconomyAPI::getInstance();
						$mymoney = $economy->myMoney($player);
						if($mymoney >= 300000){
						$economy->reduceMoney($player, 300000);
						$player->sendMessage($this->p . "§fรับฉายา หน้าม่อ เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setSuffix("§aหน§6้า§dม่อ", $player);
						} else {
						    $player->sendMessage("เงินไม่พอ");
						}
						return true;
					}
					case "6";
					if($player instanceof Player){
						$name = $player->getName();
						$economy = EconomyAPI::getInstance();
						$mymoney = $economy->myMoney($player);
						if($mymoney >= 300000){
						$economy->reduceMoney($player, 300000);
						$player->sendMessage($this->p . "§fรับฉายา มีสวยกว่าอีกหรอ เรียบร้อย");
						$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
						$pp->setSuffix("§bมีสวย§fกว่า§cอีกหรอ", $player);
						} else {
						    $player->sendMessage("เงินไม่พอ");
						}
						return true;
					}
					case "7";
					$this->addCognomen($player);
					return true;
				}
			});
			$form->setTitle("Cognomen");
			$form->addButton("สายฟรี\nฟรี");
			$form->addButton("น่ารัก\n300000 บาท");
			$form->addButton("พี่หล่อนะ\n300000 บาท");
			$form->addButton("สาวY\n300000 บาท");
			$form->addButton("โรตีดิบ\n300000 บาท");
			$form->addButton("หน้าม่อ\n300000 บาท");
			$form->addButton("มีสวยกว่าอีกหรอ\n300000 บาท");
			$form->addButton("กำหนดเอง\n2500000 บาท");
			$form->sendToPlayer($player);
	}	
	
	public function addCognomen($player){
		$formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $formapi->createCustomForm(function(Player $player, $data){
			$result = $data[0];
			if($result === null){
				return true;
			}
			if($player instanceof Player){
			$mymoney = $this->eco->myMoney($player);
			if($mymoney >= 2500000){
				$this->eco->reduceMoney($player, 2500000);
				$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
				$pp->setSuffix($data[0], $player);
				$player->sendMessage($this->p . "§fรับฉายา $data[0] เรียบร้อย");
			}else{
				$player->sendMessage("คุณมีเงินไม่พอที่จะสร้างฉายา");
			}
			}
		});
		$form->setTitle("สร้างฉายาเป็นของตัวเอง");
		$money = $this->eco->myMoney($player);
		$form->addInput("ใส่ชื่อฉายาในแบบของคุณเลย\n- ฉายาแบบกำหนดเองราคา 2500000฿\n\nYour money: $money", "ลุงตู่วิบวับ");
		$form->addLabel("สำหรับการสร้างฉายา 1 ครั้ง เสียค่าสร้างครั้งละ 2500000 ฿");
		$form->sendToPlayer($player);
	}
	public function AgeForm($player){
		$formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $formapi->createCustomForm(function(Player $player, $data){
			$result = $data[0];
			if($result === null){
				return true;
			}
			if($player instanceof Player){
				$pp = $this->getServer()->getPluginManager()->getPlugin("PureChat");
				$pp->setAge($data[0], $player);
				$player->sendMessage($this->p . "§fรับอายุ $data[0] เรียบร้อย");
			}
		});
		$form->setTitle("Age");
		$form->addSlider("เลือกอายุ", 1,100,1);
		$form->sendToPlayer($player);
	}
}