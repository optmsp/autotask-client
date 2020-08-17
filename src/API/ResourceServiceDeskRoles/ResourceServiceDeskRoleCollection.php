<?php

namespace Anteris\Autotask\API\ResourceServiceDeskRoles;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of ResourceServiceDeskRole entities.
 * @see ResourceServiceDeskRoleEntity
 */
class ResourceServiceDeskRoleCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ResourceServiceDeskRoleEntity
    {
        return parent::current();
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): ResourceServiceDeskRoleCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ResourceServiceDeskRoleEntity::arrayOf($array['items'])
        );
    }
}