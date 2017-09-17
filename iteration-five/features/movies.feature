Feature: Movie listing
  As a user
  I need to be able to see a the movies available in the database in different ways

  Scenario: Viewing all movies
    Given there are 5 movies in the database
    When I view the movies with no search criteria
    Then I should see 5 movies listed in the movie results output
