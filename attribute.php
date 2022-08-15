<?php
/**
 * Attributes adalah menambahkan meta data terhadap progrram yang kita buat.
 * Fitur ini adalah fitur yang sangat baru sekali di PHP 8, dan bisa memungkinkan fitur ini bakal di adopsi sangat banyak oleh framwork di php dimasa yang akan datang 
 * fitur ini jika di bahasa pemerograman lain seperti java bernama annotation , attributes di c# atau decolator di phyton dan di javascript
 */

 #[Attribute(Attribute::TARGET_CLASS)]
 class NotBlank{

 }

/**
 * Menggunakan Attributes
 * Attributes bisa kita bunakan di beerbagai tempat, seperti di class,funcction,Method,Property,Constant, dan Parameter
 * Untuk menggunakan attributes, kita cukup gunakan tanda #[NamaAttribute] di target yang kita tentukan
 */

 class LoginRequest{
    #[NotBlank]
    public ?string $username;

    #[NotBlank]
    public ?string $password;

    #[NotBlank]
    // ini tidak akan di cekk karena tidak pakai attribute NotBlank
    public string $captha;

 }

//  membaca attribute via reflecction 
function validate(object $object):void{
    // inisialisasi reflection
    $class = new ReflectionClass($object);
    $properties= $class->getProperties();
    foreach($properties as $property){
    validateNotBlank($property,$object);
    }
    
}

function validateNotBlank(ReflectionProperty $property, object $object){
    $attributes = $property->getAttributes(NotBlank::class);
   if(count($attributes)>0){
    if(!$property->isInitialized($object)){
        throw new Exception("Property $property->name is null");
    }
    if($property->getValue($object)==null){
        throw new Exception("Property $property->name is null");
    }
   }
}

$request = new LoginRequest();
$request->username="Riki";
$request->password="rahsiah";
validate($request);