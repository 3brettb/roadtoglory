<?php
    Route::get('/trade/items', 'Action\TradeController@items')->name('action.trade.items');
    Route::post('/trade/send', 'Action\TradeController@send')->name('action.trade.send');