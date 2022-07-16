<?php

use App\Http\Controllers\Chat\API\BlockUserAPIController;
use App\Http\Controllers\Chat\API\ChatAPIController;
use App\Http\Controllers\Chat\API\GroupAPIController;
use App\Http\Controllers\Chat\API\NotificationController;
use App\Http\Controllers\Chat\API\ReportUserController;
use App\Http\Controllers\Chat\API\UserAPIController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Chat\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('chat')->name('chat.')->middleware('isAuthUser')->group(function () {
    Route::get('/conversations', [ChatController::class, 'index'])->name('conversations');
    Route::get('profile', [UserController::class, 'getProfile']);
    Route::group(['namespace' => 'API'], function () {
        // Route::get('logout', 'Auth\LoginController@logout');

        //get all user list for chat
        Route::get('users-list', [UserAPIController::class, 'getUsersList']);
        Route::get('get-users', [UserAPIController::class, 'getUsers']);
        Route::delete('remove-profile-image', [UserAPIController::class,'removeProfileImage']);
        /** Change password */
        Route::post('change-password', [UserAPIController::class,'changePassword']);
        Route::get('conversations/{ownerId}/archive-chat', [UserAPIController::class,'archiveChat']);

        Route::get('get-profile', [UserAPIController::class,'getProfile']);
        Route::post('profile', [UserAPIController::class,'updateProfile'])->name('update.profile');
        Route::any('update-last-seen', [UserAPIController::class,'updateLastSeen']);

        Route::post('send-message',
            [ChatAPIController::class, 'sendMessage'])->name('conversations.store');//->middleware('sendMessage');
        Route::get('users/{id}/conversation', [UserAPIController::class,'getConversation']);
        Route::get('conversations-list', [ChatAPIController::class, 'getLatestConversations']);
        Route::get('archive-conversations', [ChatAPIController::class, 'getArchiveConversations']);
        Route::post('read-message', [ChatAPIController::class, 'updateConversationStatus']);
        Route::post('file-upload', [ChatAPIController::class, 'addAttachment'])->name('file-upload');
        Route::post('image-upload', [ChatAPIController::class, 'imageUpload'])->name('image-upload');
        Route::get('conversations/{userId}/delete', [ChatAPIController::class, 'deleteConversation']);
        Route::post('conversations/message/{conversation}/delete', [ChatAPIController::class, 'deleteMessage']);
        Route::post('conversations/{conversation}/delete', [ChatAPIController::class, 'deleteMessageForEveryone']);
        Route::get('/conversations/{conversation}', [ChatAPIController::class, 'show']);
        Route::post('send-chat-request', [ChatAPIController::class, 'sendChatRequest'])->name('send-chat-request');
        Route::post('accept-chat-request', [ChatAPIController::class, 'acceptChatRequest'])->name('accept-chat-request');
        Route::post('decline-chat-request', [ChatAPIController::class, 'declineChatRequest'])->name('decline-chat-request');

        /** Web Notifications */
        Route::put('update-web-notifications', [UserAPIController::class,'updateNotification']);

        /** BLock-Unblock User */
        Route::put('users/{user}/block-unblock', [BlockUserAPIController::class, 'blockUnblockUser']);
        Route::get('blocked-users', [BlockUserAPIController::class, 'blockedUsers']);

        /** My Contacts */
        Route::get('my-contacts', [UserAPIController::class,'myContacts'])->name('my-contacts');

        /** Groups API */
        Route::post('groups', [GroupAPIController::class, 'create']);
        Route::post('groups/{group}', [GroupAPIController::class, 'update']);
        Route::get('groups', [GroupAPIController::class, 'index']);
        Route::get('groups/{group}', [GroupAPIController::class, 'show']);
        Route::put('groups/{group}/add-members', [GroupAPIController::class, 'addMembers']);
        Route::delete('groups/{group}/members/{user}', [GroupAPIController::class, 'removeMemberFromGroup']);
        Route::delete('groups/{group}/leave', [GroupAPIController::class, 'leaveGroup']);
        Route::delete('groups/{group}/remove', [GroupAPIController::class, 'removeGroup']);
        Route::put('groups/{group}/members/{user}/make-admin', [GroupAPIController::class, 'makeAdmin']);
        Route::put('groups/{group}/members/{user}/dismiss-as-admin', [GroupAPIController::class, 'dismissAsAdmin']);
        Route::get('users-blocked-by-me', [BlockUserAPIController::class, 'blockUsersByMe']);

        Route::get('notification/{notification}/read', [NotificationController::class, 'readNotification']);
        Route::get('notification/read-all', [NotificationController::class, 'readAllNotification']);

        //set user custom status route
        Route::post('set-user-status', [UserAPIController::class,'setUserCustomStatus'])->name('set-user-status');
        Route::get('clear-user-status', [UserAPIController::class,'clearUserCustomStatus'])->name('clear-user-status');

        //report user
        Route::post('report-user', [ReportUserController::class, 'store'])->name('report-user.store');
    });
});
