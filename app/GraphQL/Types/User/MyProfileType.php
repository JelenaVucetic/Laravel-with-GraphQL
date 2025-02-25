<?php

declare(strict_types=1);

namespace App\GraphQL\Types\User;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MyProfileType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User/MyProfile',
        'description' => 'A User type',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => ['type' => Type::nonNull(Type::int()), 'description' => 'An user id'],
            'name' => ['type' => Type::nonNull(Type::string()), 'description' => 'An user name'],
            'email' => ['type' => Type::nonNull(Type::string()), 'description' => 'An user email'],
        ];
    }

    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }
}
