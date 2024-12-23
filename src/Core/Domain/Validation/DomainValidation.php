<?php 

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation {
    public static function notNull($value, $exceptMessage = null)
    {
        if(empty($value)){
            throw new EntityValidationException($exceptMessage ?? "Should not be empty or null");
        }
    }

    public static function strMaxLength($value, $length = 255, $exceptMessage = null)
    {
        if(strlen($value) >= $length){
            throw new EntityValidationException($exceptMessage ?? "The value must not be greater than {$length} chars");
        }
    }

    public static function strMinLength($value, $length = 3, $exceptMessage = null)
    {
        if(strlen($value) < $length){
            throw new EntityValidationException($exceptMessage ?? "The value must be at least {$length} chars");
        }
    }

    public static function strCanNullAndMaxLength($value, $length = 255, $exceptMessage = null)
    {
        if(!empty($value) && strlen($value) > $length){
            throw new EntityValidationException($exceptMessage ?? "The value must not be greater than {$length} chars");
        }
    }
}