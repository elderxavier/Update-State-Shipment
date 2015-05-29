<?php
class ElderXavier_Updatestateshipment_Model_Observer{
		
		public function catalog_product_save_toafter(Varien_Event_Observer $observer){
		//Mage::getSingleton('core/session')->addError();		
		$productthis = $observer->getProduct();	
		
		try{
			$product= Mage::getModel('catalog/product')->load($productthis->getId());
			Mage::getSingleton('core/session')->addSuccess('observar do catalog_product_save_after OK: '.$product->getId()); 		
			
			}catch(Exeption $e){
			//
				Mage::getSingleton('core/session')->addError('Erro : '.$e);			
			}
	}
	
	public function sales_order_shipment_save_toafter(Varien_Event_Observer $observer){
		//Mage::getSingleton('core/session')->addError();				
		$shipment = $observer->getEvent()->getShipment();
        $order = $shipment->getOrder();
		
		try{
			
			$orderModel = Mage::getModel('sales/order')->loadByIncrementId($order->getId());
			/*
			$orderModel->setState(Mage_Sales_Model_Order::STATE_COMPLETE, true);
				$history = Mage::getModel('sales/order_status_history')
					->setStatus($orderModel->getStatus())
					->setComment('Pagamento Aprovado Pelo Marcado Pago')
					->setEntityName(Mage_Sales_Model_Order::HISTORY_ENTITY_NAME)
					->setIsCustomerNotified(false)
					->setCreatedAt(date('d-m-Y H:i:s', time() - 60*60*24));
					
				$orderModel->addStatusHistory($history);
				$orderModel->setId($orderModel->getId())->save();
				*/
			Mage::getSingleton('core/session')->addSuccess('observar do sales_order_shipment_save_toafter-'.$order->getId() . ": '" . $order->getStatus()); 		
			
			}catch(Exeption $e){
				Mage::getSingleton('core/session')->addError('Erro : '.$e);			
			}
	}
	
}
?>