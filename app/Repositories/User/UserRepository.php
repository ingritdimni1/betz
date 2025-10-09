<?php

namespace VanguardLTE\Repositories\User;

use Carbon\Carbon;
use VanguardLTE\User;

interface UserRepository
{
    /**
     * Paginate registered users.
     *
     * @param  null  $search
     * @param  null  $status
     * @return mixed
     */
    public function paginate($perPage, $search = null, $status = null);

    /**
     * Find user by its id.
     *
     * @return null|User
     */
    public function find($id);

    public function findByEmail($email);

    /**
     * Find user by specified session id.
     *
     * @return mixed
     */
    public function findBySessionId($sessionId);

    /**
     * Create new user.
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update user specified by it's id.
     *
     * @return User
     */
    public function update($id, array $data);

    /**
     * Delete user with provided id.
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * Number of users in database.
     *
     * @return mixed
     */
    public function count($ids = []);

    /**
     * Number of users registered during current month.
     *
     * @return mixed
     */
    public function newUsersCount($ids = []);

    /**
     * Number of users with provided status.
     *
     * @return mixed
     */
    public function countByStatus($status, $ids = []);

    /**
     * Count of registered users for every month within the
     * provided date range.
     *
     * @return mixed
     */
    public function countOfNewUsersPerMonth(Carbon $from, Carbon $to, $ids = []);

    /**
     * Get latest {$count} users from database.
     *
     * @return mixed
     */
    public function latest($count = 20, $ids = []);

    /**
     * Set specified role to specified user.
     *
     * @return mixed
     */
    public function setRole($userId, $roleId);

    /**
     * Change role for all users who has role $fromRoleId to $toRoleId.
     *
     * @param  $fromRoleId  Id of current role.
     * @param  $toRoleId  Id of new role.
     * @return mixed
     */
    public function switchRolesForUsers($fromRoleId, $toRoleId);

    /**
     * Get all users with provided role.
     *
     * @return mixed
     */
    public function getUsersWithRole($roleName);

    /**
     * Find user by confirmation token.
     *
     * @return mixed
     */
    public function findByConfirmationToken($token);
}
