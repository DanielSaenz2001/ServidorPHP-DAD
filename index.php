<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $host = "localhost";
            $port = 1230;
            
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            $result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
            $result = socket_listen($socket, SOMAXCONN) or die("Could not set up socket listener\n");
            $spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
            $input = socket_read($spawn, 10000, PHP_NORMAL_READ) or die("Could not read input\n");
            echo "Mensaje del Cliente: ";
            echo $input;
            $output = "Hola Java soy PHP";
            socket_write($spawn,$output."\n", strlen($output) + 1) or die("Could not write output\n");
            
            socket_close($spawn);
            socket_close($socket);
        ?>
    </body>
</html>
