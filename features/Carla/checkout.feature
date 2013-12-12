Feature: Checkout order
  In order to buy bags for Christmas 
  As a potential customer
  I want to be able to checkout my cart 

  Scenario: Checkout cart
    Given my cart have:
      | product                                        | price |
      | Borsa shopping bamboo in pelle fucsia          | 600   |
      | Borsa shopping nice in vernice microguccissima | 700   |
    When I click "Checkout" to buy them
    Then I should see a payment message with a total of 1300 euro

