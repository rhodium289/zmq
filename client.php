<?php
/**
 * Created by PhpStorm.
 * User: henrygc
 * Date: 25/03/16
 * Time: 17:55
 */

/*
*  Hello World client
*  Connects REQ socket to tcp://localhost:5555
*  Sends "Hello" to server, expects "World" back
* @author Ian Barber <ian(dot)barber(at)gmail(dot)com>
*/

$context = new ZMQContext();

//  Socket to talk to server
echo "Connecting to hello world server…\n";
$requester = new ZMQSocket($context, ZMQ::SOCKET_PUB);
$requester->connect("tcp://192.168.1.45:5555");

for ($request_nbr = 0; $request_nbr != 10; $request_nbr++) {
    printf ("Sending request %d…\n", $request_nbr);
    $requester->send("Hello", ZMQ::MODE_DONTWAIT);

    //$reply = $requester->recv();
    //printf ("Received reply %d: [%s]\n", $request_nbr, $reply);
}
