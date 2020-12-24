<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User;

use function assert;

class ApiTokenUserProvider extends TokenUserProvider
{
    public function getUsernameForToken(string $token): ?string
    {
        $user = $this->userManager->findUserBy([
            'apiToken' => $token,
        ]);
        assert($user instanceof User);

        if ($user) {
            return $user->getUsername();
        }

        return null;
    }
}
