@qbank @qbank_exporttoxml
Feature: Use the qbank plugin manager page for exporttoxml
  In order to check the plugin behaviour with enable and disable

  Background:
    Given the following "courses" exist:
      | fullname | shortname | category |
      | Course 1 | C1        | 0        |
    And the following "activities" exist:
      | activity   | name      | course | idnumber |
      | quiz       | Test quiz | C1     | quiz1    |
    And the following "question categories" exist:
      | contextlevel    | reference | name           |
      | Activity module | quiz1     | Test questions |
    And the following "questions" exist:
      | questioncategory | qtype     | name           | questiontext              |
      | Test questions   | truefalse | First question | Answer the first question |

  Scenario: Enable/disable exporttoxml column from the base view
    Given I log in as "admin"
    When I navigate to "Plugins > Question bank plugins > Manage question bank plugins" in site administration
    And I should see "Export to XML"
    And I click on "Disable" "link" in the "Export to XML" "table_row"
    And I am on the "Test quiz" "mod_quiz > question bank" page
    Then the "Export as Moodle XML" action should not exist for the "First question" question in the question bank
    And I navigate to "Plugins > Question bank plugins > Manage question bank plugins" in site administration
    And I click on "Enable" "link" in the "Export to XML" "table_row"
    And I am on the "Test quiz" "mod_quiz > question bank" page
    And the "Export as Moodle XML" action should exist for the "First question" question in the question bank
