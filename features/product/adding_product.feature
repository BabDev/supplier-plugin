@managing_products_with_suppliers
Feature: Adding a new product with a supplier
    In order to extend my merchandise
    As an Administrator
    I want to add a new product to the shop with a supplier

    Background:
        Given the store operates on a single channel in "United States"
        And the store has supplier "Sylius Development"
        And I am logged in as an administrator

    @ui
    Scenario: Adding a new simple product with a supplier
        Given I want to create a new simple product
        When I specify its code as "BOARD_DICE_BREWING"
        And I name it "Dice Brewing" in "English (United States)"
        And I set its slug to "dice-brewing" in "English (United States)"
        And I set its price to "$10.00" for "United States" channel
        And I set its supplier as "Sylius Development"
        And I add it
        Then I should be notified that it has been successfully created
        And the product "Dice Brewing" should appear in the store
