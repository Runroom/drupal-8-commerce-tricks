<?php

// ******************************
// Access to current order object
// ******************************
	
	// Get entity manager
	$entityManager = \Drupal::entityManager();

	// Get order type
	$orderStorage = $entityManager->getStorage('commerce_order_type');
	$orderType = $orderStorage->load('consumer_products')->id();
	
	// Get store
	$store = $entityManager->getStorage('commerce_store')->loadDefault();
	
	// Currrent user
	$uid = \Drupal::currentUser();
	
	// Get Cart provider
	$cartProvider = Drupal::service('commerce_cart.cart_provider');
	
	// Get Cart
	$order = $cartProvider->getCart($orderType, $store, $uid);


// ******************************
// Get path object
// ******************************
  $path = '/node/3'
	$pathObbject = \Drupal::service('path.validator')->getUrlIfValid($path);


// ******************************
// Checkout Btn by order
// ******************************

  $routeName = 'commerce_checkout.form';
  $routeNameParameterKey = 'commerce_order';
  $routeNameParameterValue = 'orderId';
  
	 //Ex:
	 // <a href="{{ path('commerce_checkout.form', {'commerce_order': order_id}) }}" class='link'>{{ 'Buy'|t }}</a>


// ***********************************
// Apply currency price format in twig
// ***********************************

// {{ price|commerce_price_format }}

// ********************************
// Get variation data by target_id
// ********************************

  // If we have the targe_id of a variation type for product, we can 
  // load the variation data by:
  $target_id = '5';
  $price = \Drupal::entityTypeManager()->getStorage('commerce_product_variation')->load($target_id)->getPrice();

  // We can get the EntityTypeId of variation by:
  // $entity_type_id is 'commerce_product_variation';
  $entity_type_id = $product->getDefaultVariation()->getEntityTypeId();

// ***************************************
// Get currency object by currency storage
// ***************************************

  $price = new Price('9,99', 'EUR');
  $currency_storage = \Drupal::entityTypeManager()->getStorage('commerce_currency');
  $currency = $currency_storage->load($price->getCurrencyCode());
  $symbol = $currency->getSymbol();
