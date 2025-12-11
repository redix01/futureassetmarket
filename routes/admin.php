<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CopyTraderController;
use App\Http\Controllers\Admin\CryptoAssetController;
use App\Http\Controllers\Admin\CryptoExchangeController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\SignalController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\TradeSignalController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('update/profile', [AdminController::class, 'updateProfile'])->name('updateProfile');
    Route::get('activities', [AdminController::class, 'activities'])->name('activities');
    Route::get('security', [AdminController::class, 'security'])->name('security');
    Route::post('update/password', [AdminController::class, 'updatePassword'])->name('updatePassword');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('verify/user/{id}', [UserController::class, 'verifyUser'])->name('verifyUser');
    Route::post('fund/user/{id}', [UserController::class, 'fundUser'])->name('fundUser');
    Route::delete('delete/user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

    Route::get('user/assets/{id}', [UserController::class, 'userAssets'])->name('userAssets');
    Route::patch('update/asset/{id}', [CryptoAssetController::class, 'updateAsset'])->name('updateAsset');

    Route::resource('/payment-method', PaymentMethodController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::post('/save/bank-details', [PaymentMethodController::class, 'storeBankDetails'])->name('storeBankDetails');
    Route::post('/update/bank-details/{id}', [PaymentMethodController::class, 'updateBankDetails'])->name('updateBankDetails');

    Route::get('deposit/history', [TransactionController::class, 'deposits'])->name('transactions.deposits');
    Route::get('approve/deposit/{id}', [TransactionController::class, 'approveDeposit'])->name('approveDeposit');
    Route::get('transactions/withdrawal', [TransactionController::class, 'withdraws'])->name('transactions.withdraws');
    Route::get('approve/withdrawal/{id}', [TransactionController::class, 'approveWithdraw'])->name('approveWithdraw');

    Route::get('all/stocks', [StockController::class, 'index'])->name('stocks.index');
    Route::delete('delete/stock/{id}', [StockController::class, 'deleteStock'])->name('deleteStock');
    Route::get('trade/history', [StockController::class, 'tradeHistory'])->name('tradeHistory');
    Route::post('trade/profit/{id}', [StockController::class, 'addStockProfit'])->name('addStockProfit');
    Route::put('trade/pnl/{id}', [StockController::class, 'updateTradePnl'])->name('updateTradePnl');
    Route::put('trade/close/{id}', [StockController::class, 'closeTrade'])->name('closeStockTrade');
    Route::put('trade-room/profit/{id}', [StockController::class, 'updateTradeRoomProfit'])->name('updateTradeRoomProfit');
    Route::put('trade-room/close/{id}', [StockController::class, 'closeTradeRoom'])->name('closeTradeRoom');
    Route::delete('delete/trade/{id}', [StockController::class, 'deleteTrade'])->name('deleteTrade');

    Route::get('crypto/exchange/history', [CryptoExchangeController::class, 'cryptoExchange'])->name('cryptoExchange');
    Route::post('approve/crypto/deposit/{id}', [CryptoExchangeController::class, 'cryptoExchangeStore'])->name('cryptoExchangeStore');
    Route::post('approve/crypto/withdrawal/{id}', [CryptoExchangeController::class, 'cryptoExchangeWithdraw'])->name('cryptoExchangeWithdraw');

    Route::resource('/signal', SignalController::class);

    Route::get('/traded/signal/history', [TradeSignalController::class, 'index'])->name('tradeSignal.index');
    Route::post('/trade/pnl', [TradeSignalController::class, 'tradePNL'])->name('tradePNL');
    Route::get('/close/trade/{id}', [TradeSignalController::class, 'closeTrade'])->name('closeTrade');

    Route::get('create/copy-trader', [CopyTraderController::class, 'index'])->name('copyTrader.index');
    Route::post('store/copy-trader', [CopyTraderController::class, 'store'])->name('copyTrader.store');
    Route::patch('update/copy-trader/{id}', [CopyTraderController::class, 'update'])->name('copyTrader.update');
    Route::delete('delete/copy-trader/{id}', [CopyTraderController::class, 'destroy'])->name('copyTrader.destroy');

});
