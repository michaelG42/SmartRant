<?php

interface IConnection 
{
    //All these methods are public and abstract (i.e. they have no method body)
    function open();
    function close();
    function execute($query);
}
