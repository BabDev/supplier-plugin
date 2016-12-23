@managing_suppliers
Feature: Suppliers validation
    In order to avoid making mistakes when managing a supplier
    As an Administrator
    I want to be prevented from adding it without specifying required fields

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Trying to add a new supplier without specifying its description
        Given I want to add a new supplier
        When I set its name to "Sylius Development"
        And I add it
        Then I should be notified that description is required
        And the supplier "Sylius Development" should not be added

    @ui
    Scenario: Trying to add a new supplier without specifying its name
        Given I want to add a new supplier
        When I set its description to "Service provider of Sylius development tools"
        And I add it
        Then I should be notified that name is required
        And the supplier "Sylius Development" should not be added
