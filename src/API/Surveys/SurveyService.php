<?php

namespace Anteris\Autotask\API\Surveys;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Surveys.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/SurveysEntity.htm Autotask documentation.
 */
class SurveyService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the Survey based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): SurveyEntity
    {
        return SurveyEntity::fromResponse(
            $this->client->get("Surveys/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see SurveyQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): SurveyQueryBuilder
    {
        return new SurveyQueryBuilder($this->client);
    }

}