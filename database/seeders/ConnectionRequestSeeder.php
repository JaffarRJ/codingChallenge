<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ConnectionRequest;
use App\Models\User;
class ConnectionRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get some user IDs
        $userIds = User::pluck('id')->toArray();

        // Create connection requests between random users
        foreach ($userIds as $senderId) {
            $receiverId = $userIds[array_rand($userIds)];

            // Make sure the sender and receiver are different and not already connected
            while ($senderId === $receiverId || ConnectionRequest::where('sender_id', $senderId)->where('receiver_id', $receiverId)->exists()) {
                $receiverId = $userIds[array_rand($userIds)];
            }

            ConnectionRequest::create([
                'sender_id' => $senderId,
                'receiver_id' => $receiverId,
            ]);
        }
    }
}
