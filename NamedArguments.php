<?php
/**
 * Biasannnya saat kita memanggil function, maka kita harus memasukan arguments atau parameter sesuai dengan posisinya
 * Dengan kemampuan named argument, kita bisa memasukan argument atau parameter tanpa harus mengikuti posisinya 
 * Namaun penggunaan named arguments harus di sebutkan nama argument nya atau parameternya 
 * Named Argument juga menjadikan kode program mudah dibaca ketika memanggil fuction yang memiliki argument yang sangat banyak
 * http://wiki.php.net/rfc/named_params
 */

 function sayHello(string $first ,string $middle="",string $last):void{
    echo "Hello $first $middle $last".PHP_EOL;
 }

//  tanpa named argument harus berurutan $first, $middle, $last
sayHello("Asep","Riki","Hari");

// dengan menggunakan named argument secara acak pun tidak masalah
sayHello(last:"Hari",first:"Asep",middle:"Riki");

// named argument juga memudahkan ketika ada default argument yang berada di tengah, misal $middle="";
// jika tanpa default argument maka akan error
// sayHello("Asep","Hari"); //Error

// dengan Named Argument
sayHello("Asep", last:"Hari");
