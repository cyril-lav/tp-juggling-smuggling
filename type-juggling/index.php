<?php

include_once 'Request.php';
include_once 'Router.php';
$router = new Router(new Request);
$pass = "xbxXoNKUqZj5Kl20lhB3HuXeQwx5yKWPpVwesxOtQXs4f54wq5ejH4Esi4yBVkUYwWDIcIySshvEFBG5Lby8WAfwwgS3VEPEYpoW";


$router->get('/', function() {
  return <<<HTML
  <!DOCTYPE html>
    <head>
        <title>Form</title>
    </head>
    <html>
        <form action="/" method="POST">
            <label>Login</label>
            <input type="text" name="login"/>
            <label>Password</label>
            <input type="text" name="password"/>
            <input type="submit" value="Envoyer"/>
        </form>
    </html>
HTML;
});


$router->post('/', function($request) {
  $login = "admin";
  $pass = "xbxXoNKUqZj5Kl20lhB3HuXeQwx5yKWPpVwesxOtQXs4f54wq5ejH4Esi4yBVkUYwWDIcIySshvEFBG5Lby8WAfwwgS3VEPEYpoW";
  $body = $request->getBody();

  if($body["login"] == $login && $body["password"] == $pass){ 
    return <<<HTML
    <!DOCTYPE html>
        <head>
            <title>Bravo</title>
        </head>
        <html>
            <h1> Félicitations </h1>
        </html>
    HTML;
  } 
  else{
    return <<<HTML
    <!DOCTYPE html>
        <head>
            <title>Raté</title>
        </head>
        <html>
            <h1> Login ou Mot de passe incorect </h1>
            <a href="/">Retour</a>
        </html>
    HTML;
  } 
});
