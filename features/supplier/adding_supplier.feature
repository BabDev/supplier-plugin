@managing_suppliers
Feature: Adding a new supplier
    In order to manage content
    As an Administrator
    I want to add supplier to my site

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Adding supplier
        Given I want to add a new supplier
        When I specify its code as "sylius-development"
        And I set its name to "Sylius Development"
        And I set its description to "Service provider of Sylius development tools"
        And I add it
        Then I should be notified that it has been successfully created
        And the supplier "Sylius Development" should appear in the store

    @ui
    Scenario: Adding supplier with additional features
        Given I want to add a new supplier
        When I specify its code as "sylius-development"
        And I set its name to "Sylius Development"
        And I set its description to "Service provider of Sylius development tools"
        And I set its contact email to "sylius@example.com"
        And I add it
        Then I should be notified that it has been successfully created
        And the supplier "Sylius Development" should appear in the store
