<?php

namespace App\Security;

class Roles {

    const SUPPORTED_ROLES = [
        self::Admin,
        self::User,
    ];

    const Admin = 'admin';
    const User = 'user';
}
