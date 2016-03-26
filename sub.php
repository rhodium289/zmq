<?php
/**
 * Created by PhpStorm.
 * User: henrygc
 * Date: 25/03/16
 * Time: 17:39
 */

/*
*  Hello World server
*  Binds REP socket to tcp://*:5555
*  Expects "Hello" from client, replies with "World"
* @author Ian Barber <ian(dot)barber(at)gmail(dot)com>
*/

$context = new ZMQContext();

//  Socket to talk to clients
$subscriber = new ZMQSocket($context, ZMQ::SOCKET_SUB);
$subscriber->connect("tcp://192.168.1.56:5555");
$subscriber->setSockOpt(ZMQ::SOCKOPT_SUBSCRIBE, "");
$i=0;
while (true) {
    //  Wait for next request from client
    $request = $subscriber->recv();
    $i++;
    if ($request=='END') {
      break;
    }
}

echo 'Recieved '.$i.' messages';
