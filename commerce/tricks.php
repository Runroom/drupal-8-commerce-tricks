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