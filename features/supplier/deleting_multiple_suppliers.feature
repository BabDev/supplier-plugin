@managing_suppliers
Feature: Deleting multiple suppliers
    In order to remove test, obsolete or incorrect suppliers in an efficient way
    As an Administrator
    I want to be able to delete multiple suppliers at once

    Background:
        Given the store has suppliers "Sylius Development" and "BabDev"
        And the store has also supplier "Michael's Software"
        And I am logged in as an administrator

    @ui @javascript
    Scenario: Deleting multiple suppliers at once
        When I want to browse suppliers of the store
        And I check the "Sylius Development" supplier
        And I check also the "BabDev" supplier
        And I delete them
        Then I should be notified that they have been successfully deleted
        And I should see a single supplier in the list
        And I should see the supplier "Michael's Software" in the list
