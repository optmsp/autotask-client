<?php

namespace Anteris\Autotask\API\AdditionalInvoiceFieldValues;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents AdditionalInvoiceFieldValue entities.
 */
class AdditionalInvoiceFieldValueEntity extends DataTransferObject
{
    public int $additionalInvoiceFieldID;
    public string $fieldValue;
    public int $id;
    public int $invoiceBatchID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        parent::__construct($array);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response)
    {
        $responseArray = json_decode($response->getBody(), true);

        if (isset($responseArray['item']) === false) {
            throw new \Exception('Missing item key in response.');
        }

        return new self($responseArray['item']);
    }
}