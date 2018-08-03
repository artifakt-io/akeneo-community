@javascript
Feature: Browse channels
  In order to list the existing channels for the catalog
  As an administrator
  I need to be able to see channels

  Scenario: Successfully view, sort and filter channels
    Given an "apparel" catalog configuration
    And I am logged in as "Peter"
    And I am on the channels page
    Then the grid should contain 3 elements
    And I should see the columns Code, Label and Category tree
    And I should see channels ecommerce, tablet and print
    And the rows should be sorted ascending by Code
    And I should be able to sort the rows by Code, Label and Category tree
    And I should be able to use the following filters:
      | filter   | operator | value           | result               |
      | code     | contains | t               | tablet and print     |
      | label    | contains | e               | ecommerce and tablet |
      | category |          | 2015 collection | print                |
