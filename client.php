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
$requester->bind("tcp://*:5555");


for($i=0; $i<1000000; $i++) {
    $msg=json_encode(array('value'=>rand(1,10000)));
    $requester->send($msg);
}

    $requester->send('END');
