@managing_suppliers
Feature: Deleting a supplier
    In order to remove test, obsolete or incorrect suppliers
    As an Administrator
    I want to be able to delete a supplier

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Deleted supplier should disappear from the registry
        Given the store has supplier "Sylius Development"
        When I delete supplier "Sylius Development"
        Then I should be notified that it has been successfully deleted
        And the supplier "Sylius Development" should no longer exist in the store
