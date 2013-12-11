Feature: user handle Cart 
  In order to purchase serveral bags at once
  As a potential customer
  I want to collect those products in a cart

  Scenario: Add product in an empty cart
    Given I am in the product page
    And my cart is empty
    When I add a "Borsa shopping bamboo in pelle fucsia"
    Then my cart should contain 1 "Borsa shopping bamboo in pelle fucsia" product
