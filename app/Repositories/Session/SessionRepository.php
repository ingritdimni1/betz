<?php

namespace VanguardLTE\Repositories\Session;

interface SessionRepository
{
    /**
     * Find session by id.
     *
     * @return mixed
     */
    public function find($sessionId);

    /**
     * Get all active sessions for specified user.
     *
     * @return mixed
     */
    public function getUserSessions($userId);

    /**
     * Invalidate specified session for provided user
     *
     * @return mixed
     */
    public function invalidateSession($sessionId);

    /**
     * Invalidate all sessions for user with given id.
     *
     * @return mixed
     */
    public function invalidateAllSessionsForUser($userId);
}
