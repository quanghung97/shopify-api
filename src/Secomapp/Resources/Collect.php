<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

class Collect extends BaseResource
{
    /**
     * Create a new Collect
     *
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function create($params)
    {
        return $this->client->post('collects.json', 'collect', [
            'collect' => $params
        ]);
    }

    /**
     * Remove a Collect from the database
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("collects/{$id}.json");
    }

    /**
     * Receive a list of all Collects
     *
     * @param array $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get('collects.json', 'collects', $params);
    }

    /**
     * Receive a count of all Collects
     *
     * @param array $params
     *
     * @return integer
     * @throws ShopifyApiException
     */
    public function count($params = [])
    {
        return $this->client->get('collects/count.json', 'count', $params);
    }

    /**
     * Receive a single Collect
     *
     * @param string $id
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("collects/{$id}.json", 'collects', $this->prepareParams($fields));
    }
}
