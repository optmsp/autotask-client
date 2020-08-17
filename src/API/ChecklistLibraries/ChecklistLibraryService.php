<?php

namespace Anteris\Autotask\API\ChecklistLibraries;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ChecklistLibraries.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ChecklistLibrariesEntity.htm Autotask documentation.
 */
class ChecklistLibraryService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new checklistlibrary.
     *
     * @param  ChecklistLibraryEntity  $resource  The checklistlibrary entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ChecklistLibraryEntity $resource)
    {
        $this->client->post("ChecklistLibraries", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ChecklistLibrary to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ChecklistLibraries/$id");
    }

    /**
     * Finds the ChecklistLibrary based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ChecklistLibraryEntity
    {
        return ChecklistLibraryEntity::fromResponse(
            $this->client->get("ChecklistLibraries/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ChecklistLibraryQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ChecklistLibraryQueryBuilder
    {
        return new ChecklistLibraryQueryBuilder($this->client);
    }

    /**
     * Updates the checklistlibrary.
     *
     * @param  ChecklistLibraryEntity  $resource  The checklistlibrary entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ChecklistLibraryEntity $resource): void
    {
        $this->client->put("ChecklistLibraries/$resource->id", $resource->toArray());
    }
}