<?php

// ******************************
// Access to current order object
// ******************************
	
	// Get entity manager
	$entity_manager = \Drupal::entityManager();

	// Get order type
	$order_storage = $entity_manager->getStorage('commerce_order_type');
	$order_type = $order_storage->load('consumer_products')->id();
	
	// Get store
	$store = $entity_manager->getStorage('commerce_store')->loadDefault();
	
	// Currrent user
	$uid = \Drupal::currentUser();
	
	// Get Cart provider
	$cartProvider = Drupal::service('commerce_cart.cart_provider');
	
	// Get Cart
	$order = $cartProvider->getCart($order_type, $store, $uid);


// ******************************
// Get path object
// ******************************
  $path = '/node/3'
	$path_object = \Drupal::service('path.validator')->getUrlIfValid($path);


// ******************************
// Checkout Btn by order
// ******************************

  $routeName = 'commerce_checkout.form';
  $routeNameParameterKey = 'commerce_order';
  $routeNameParameterValue = 'orderId';
  
	 //Ex:
	 // <a href="{{ path('commerce_checkout.form', {'commerce_order': order_id}) }}" class='link'>{{ 'Buy'|t }}</a>