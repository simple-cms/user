<?php

use \View;

// Route::controller('auth', 'Auth\AuthController');

// Route::controller('password', 'Auth\RemindersController');


Route::get('login', function (){

  return View::make('user::Admin/Login');

});

// Route::group(['prefix' => 'control'], function()
// {
//   //Display the login form
//   Route::get('login', ['as' => 'login', function()
//   {
//       return View::make('core::Admin/Login', [
//         'pageTitle' => 'Login',
//       ]);
//   }]);

//   // Validate the login attempt
//   Route::post('login', [function() {
//     // One of the input fields is empty...
//     if (Input::get('email') == '' || Input::get('password') == '')
//     {
//       //Return to the login page with a message
//       return Redirect::route('login')
//         ->with('message-type', 'info')
//         ->with('message-content', 'Please fill in both fields!')
//       ;
//     }
//     // Both fields contain values so try and log the user in using the supplied fields
//     else
//     {
//       // The user is found, and the correct details were supplied, so log the user in
//       if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]))
//       {
//         return Redirect::route('dashboard');
//       }
//       else
//       {
//         // Return to the login page with a message
//         return Redirect::route('login')
//           ->with('message-type', 'danger')
//           ->with('message-content', 'Incorrect Details!')
//         ;
//       }
//     }
//   }]);

//   // Logout
//   Route::get('logout', array('as' => 'logout', function() {
//     Auth::logout();
//     return Redirect::route('login')
//       ->with('message-type', 'info')
//       ->with('message-content', 'Successfully logged out!');
//     }
//   ));
// });