@managing_suppliers
Feature: Browsing suppliers
    In order to see all suppliers in the store
    As an Administrator
    I want to browse suppliers

    Background:
        Given the store has suppliers "BabDev" and "Sylius"
        And I am logged in as an administrator

    @ui
    Scenario: Browsing suppliers in store
        When I want to browse suppliers of the store
        Then I should see 2 suppliers in the list
        And I should see the supplier "BabDev" in the list
