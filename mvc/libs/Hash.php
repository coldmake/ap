<?php

class Hash {

   /**
    * 
    * @param string $algo The algorithm (md5,sha1, whirlpool, etc)
    * @param string $data The data to encode
    * @param string $salt The salt (This should be the same throughout the system)
    * @return string The hashed/salted data
    * 
    */
    
    function __construct() {
        
    }
    
    //Hash::create('md5','passwordhere','SaltIfThereIsOne');
    public static function create($algo,$data, $salt) {
        $context = hash_init($algo, HASH_HMAC, $salt);
        hash_update($context,$data);
        
        return hash_final($context);
    }

}
?>
