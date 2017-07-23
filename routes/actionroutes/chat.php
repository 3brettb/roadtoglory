<?php

Route::post('/chat/{chat}/comment', 'Action\ChatController@comment')->name('action.chat.postcomment');