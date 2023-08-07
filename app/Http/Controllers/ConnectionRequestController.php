<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConnectionRequest;

class ConnectionRequestController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Assuming you have a logged-in user, get their ID
        $senderId = auth()->user()->id;
        // Get the receiver's ID from the AJAX request
        $receiverId = $request->input('receiver_id');

        // Create a new connection request
        ConnectionRequest::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'accepted' => false, // The request is not accepted initially
        ]);
        return response()->json(['message' => 'Connection request sent successfully']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function withdraw(Request $request)
    {
        $connectionRequestId = $request->input('connection_request_id');

        $connectionRequest = ConnectionRequest::find($connectionRequestId);

        if (!$connectionRequest) {
            return response()->json(['error' => 'Connection request not found'], 404);
        }

        // Ensure that the authenticated user is the sender of the request
        if ($connectionRequest->sender_id === auth()->user()->id) {
            $connectionRequest->delete();
            return response()->json(['message' => 'Connection request withdrawn successfully']);
        } else {
            return response()->json(['error' => 'You are not authorized to withdraw this request'], 403);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function accept(Request $request)
    {
        $connectionRequestId = $request->input('connection_request_id');

        $connectionRequest = ConnectionRequest::find($connectionRequestId);

        if (!$connectionRequest) {
            return response()->json(['error' => 'Connection request not found'], 404);
        }

        // Ensure that the authenticated user is the receiver of the request
        if ($connectionRequest->receiver_id === auth()->user()->id) {
            $connectionRequest->update(['accepted' => true]);
            return response()->json(['message' => 'Connection request accepted successfully']);
        } else {
            return response()->json(['error' => 'You are not authorized to accept this request'], 403);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeConnectionRequest(Request $request)
    {
        $senderId = $request->input('connection_request_id');
        $receiverId = auth()->user()->id;

        $connectionRequest = ConnectionRequest::where('sender_id', $senderId)
            ->where('receiver_id', $receiverId)
            ->first();

        if (!$connectionRequest) {
            return response()->json(['error' => 'Connection request not found'], 404);
        }

        // You can add additional checks here if needed, such as verifying the authenticated user's ID

        $connectionRequest->delete();

        return response()->json(['message' => 'Connection request removed successfully']);
    }
}
