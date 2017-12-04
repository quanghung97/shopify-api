<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Contracts\ChargeContract;
use Secomapp\Exceptions\ShopifyApiException;

class RecurringApplicationCharge extends BaseResource implements ChargeContract
{
    /**
     * Create a recurring application charge
     *
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function create($params)
    {
        return $this->client->post('recurring_application_charges.json', 'recurring_application_charge', [
            'recurring_application_charge' => $params,
        ]);
    }

    /**
     * Receive a single RecurringApplicationCharge
     *
     * @param string $id
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("recurring_application_charges/{$id}.json", 'recurring_application_charge', $this->prepareParams($fields));
    }

    /**
     * Retrieve all one-time application charges
     *
     * @param array $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get("recurring_application_charges.json", 'recurring_application_charge', $params);
    }

    /**
     * Retrieve all recurring application charges
     *
     * @param string $id
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function activate($id, $params = [])
    {
        return $this->client->post("recurring_application_charges/{$id}/activate.json", 'recurring_application_charge', [
            'recurring_application_charge' => ($params ?: ['id' => $id]),
        ]);
    }

    public function activeStatus($status)
    {
        return in_array($status, ['accepted', 'active']);
    }
}
