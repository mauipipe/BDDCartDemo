Feature: user handle Cart 
  In order to purchase serveral bags at once
  As a potential customer
  I want to collect those products in a cart

  Scenario: Add product in an empty cart
    Given I am in the product page
    And my shopping cart is empty
    When I add a "Borsa shopping bamboo in pelle fucsia"
    Then my cart should contain 1 product

 Scenario: Add a product with different name to not empty cart
    Given I am in the product page
    And my shopping cart already have 1 product
    When I add a "Borsa a mani gucci nice in coccodrillo" 
    Then my cart should contain 2 product

 Scenario: Remove a product from cart
    Given I am in the product page
    And my shopping cart already have 1 product
    When I remove the product from it
    Then my cart should contain 0 product

 
