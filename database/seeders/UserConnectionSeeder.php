<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserConnection;
use Faker\Factory as Faker;

class UserConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get some user IDs
        $userIds = User::pluck('id')->toArray();

        // Create connections between random users
        foreach ($userIds as $userId) {
            // Determine how many connections to create for each user
            $numConnections = $faker->numberBetween(1, 5);

            // Make sure a user cannot connect to themselves
            $userIdsWithoutSelf = array_diff($userIds, [$userId]);

            // Randomly select connection IDs for the current user
            $connectionIds = $faker->randomElements($userIdsWithoutSelf, $numConnections);

            // Create connections
            foreach ($connectionIds as $connectionId) {
                UserConnection::create([
                    'user_id' => $userId,
                    'connection_id' => $connectionId,
                ]);
            }
        }
    }
}
