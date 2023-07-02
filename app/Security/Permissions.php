<?php

namespace App\Security;

class Permissions {

    const SUPPORTED_PERMISSIONS = [
        self::DELETE_USERS,
        self::VIEW_ADMIN_DASHBOARD,
    ];

    const DELETE_USERS = 'delete users';
    const VIEW_ADMIN_DASHBOARD = 'view admin dashboard';
}
