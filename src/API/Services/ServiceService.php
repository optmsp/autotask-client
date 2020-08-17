<?php

namespace Anteris\Autotask\API\Services;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Services.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServicesEntity.htm Autotask documentation.
 */
class ServiceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new service.
     *
     * @param  ServiceEntity  $resource  The service entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ServiceEntity $resource)
    {
        $this->client->post("Services", $resource->toArray());
    }


    /**
     * Finds the Service based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ServiceEntity
    {
        return ServiceEntity::fromResponse(
            $this->client->get("Services/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ServiceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ServiceQueryBuilder
    {
        return new ServiceQueryBuilder($this->client);
    }

    /**
     * Updates the service.
     *
     * @param  ServiceEntity  $resource  The service entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ServiceEntity $resource): void
    {
        $this->client->put("Services/$resource->id", $resource->toArray());
    }
}