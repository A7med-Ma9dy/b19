<?php
# crud => create-read-update-delete

interface crud {
    function create();
    function read();
    function update($id);
    function delete($id);
}

interface data {
    function import();
    function export();
}
# php single inheritance , multiple implements
class product implements crud,data {
    function create(){

    }
    function read(){

    }
    function update($id){

    }
    function delete($id){

    }
    function import(){

    }
    function export(){

    }
}


class user implements crud {
    function create(){

    }
    function read(){

    }
    function update($id){

    }
    function delete($id){

    }
}


class offer implements crud  {
    function create(){

    }
    function read(){

    }
    function update($id){

    }
    function delete($id){

    }
}