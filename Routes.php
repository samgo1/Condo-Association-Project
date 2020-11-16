<?php

    Route::set('index.php', function() {
        Index::CreateView('index');
    }); 

    Route::set('financial-status', function() {
        Index::CreateView('financialStatus');
    });  
?>