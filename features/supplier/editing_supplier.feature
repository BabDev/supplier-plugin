@managing_suppliers
Feature: Editing a supplier
    In order to change supplier
    As an Administrator
    I want to be able to edit a supplier

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Change description of a supplier
        Given the store has supplier "Sylius Development" with description "Service provider of Sylius development tools"
        And I want to edit this supplier
        When I change its description to "The best provider all over the world!"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this supplier should have description "The best provider all over the world!"
