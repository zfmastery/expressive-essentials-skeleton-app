<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given there are :arg1 movies in the database
     */
    public function thereAreMoviesInTheDatabase($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I view the movies with no search criteria
     */
    public function iViewTheMoviesWithNoSearchCriteria()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see :arg1 movies listed in the movie results output
     */
    public function iShouldSeeMoviesListedInTheMovieResultsOutput($arg1)
    {
        throw new PendingException();
    }
}
