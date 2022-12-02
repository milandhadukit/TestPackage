<?php



Route::get('/cal',function(){

    echo "hello calculator package";

});

Route::get('/add/{a}/{b}',[LP\Calculator\CalculatorController::class,'add']);