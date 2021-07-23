<?php

namespace KongGateway\AdminAPI\Plugin\TrafficControl;

use KongGateway\AdminAPI\Plugin;

class ACL extends Plugin
{
    public $name = 'acls';

    /**
     * Associate Consumers to an ACL.
     *
     * @see https://docs.konghq.com/hub/kong-inc/acl/#associate-consumers-to-an-acl
     */
    public function create($identifier, $data)
    {
        return $this->response(
            $this->client()->post(
                $this->consumerPath($identifier).'/acls', [
                    'form_params' => $data,
                ])
        );
    }

    /**
     * Retrieve ACLs by Consumer.
     *
     * @see https://docs.konghq.com/hub/kong-inc/acl/#retrieve-acls-by-consumer
     */
    public function showAll($identifier)
    {
        return $this->response(
            $this->client()->get($this->consumerPath($identifier).'/acls')
        );
    }

    /**
     * Retrieve Consumer by ID.
     *
     * @see https://docs.konghq.com/hub/kong-inc/acl/#retrieve-consumer-by-id
     */
    public function show($consumer, $identifier)
    {
        return $this->response(
            $this->client()->get($this->consumerPath($consumer).'/acls/'.$identifier)
        );
    }

    /**
     * Retrieve the Consumer associated with an ACL.
     *
     * @see https://docs.konghq.com/hub/kong-inc/acl/#retrieve-the-consumer-associated-with-an-acl
     */
    public function showById($consumer, $identifier)
    {
        return $this->response(
            $this->client()->get($this->pluginPath().'/'.$identifier.'/consumer')
        );
    }

    /**
     * Upsert an ACL group name.
     *
     * @see https://docs.konghq.com/hub/kong-inc/acl/#upsert-an-acl-group-name
     */
    public function upsert($consumer, $identifier, $data)
    {
        return $this->response(
            $this->client()->put(
                $this->consumerPath($consumer).'/acls'.$identifier, [
                    'form_params' => $data,
                ])
        );
    }

    /**
     * Update an ACL group by ID.
     *
     * @see https://docs.konghq.com/hub/kong-inc/acl/#update-an-acl-group-by-id
     */
    public function updateGroupName($consumer, $data)
    {
        return $this->response(
            $this->client()->post(
                $this->consumerPath($consumer).'/acls', [
                    'form_params' => $data,
                ])
        );
    }

    /**
     * Delete an ACL group.
     *
     * @see https://docs.konghq.com/hub/kong-inc/acl/#update-an-acl-group-by-id
     */
    public function delete($identifier)
    {
        return $this->response(
            $this->client()->delete(
                $this->consumerPath($identifier).'/acls'
            )
        );
    }
}
