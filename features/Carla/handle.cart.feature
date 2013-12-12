Feature: user handle Cart
  In order to purchase serveral bags at once
  As a potential customer
  I want to collect those products in a cart

  Background: 
    Given I am in the product page

  Scenario Outline: Add product in an empty cart
     And my shopping cart already have <product inside cart> product
    When I add a <product>
    Then my cart should contain <product nr> product

    Examples: 
      | product                                  | product inside cart | product nr |
      | "Borsa shopping bamboo in pelle fucsia"  | 0                   | 1          |
      | "Borsa a mani gucci nice in coccodrillo" | 1                   | 2          |


  Scenario: Remove a product from cart
    And my shopping cart already have 1 product
    When I remove the product from it
    Then my cart should contain 0 product
