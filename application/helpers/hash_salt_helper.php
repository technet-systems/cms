<?php
function hash_salt($password) {
    return hash('sha512', $password . ':' . config_item('encryption_key'));
    
}