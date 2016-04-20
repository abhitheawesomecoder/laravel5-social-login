<?php
Route::group(['middleware' => 'web'], function () {

Route::get('auth/facebook', 'abhitheawesomecoder\sociallogin\controller\SocialloginController@redirectToProvider');
Route::get('auth/facebook/callback', 'abhitheawesomecoder\sociallogin\controller\SocialloginController@handleProviderCallback');

});