<?php
/**
 * File containing the XrowMetadata Value class
 */

namespace xrow\XrowMetadataBundle\FieldType\XrowMetadata;

use eZ\Publish\Core\FieldType\Value as BaseValue;

/**
 * Value for EzauthorRelation field type
 */
class Value extends BaseValue
{
    public $keywords=array();
    
    public $description;
    
    public $title;
    
    /**
     * Construct a new Value object and initialize with $values
     *
     * @param string[]|string $values
     */
    public function __construct( $values = null )
    {
        if(is_string($values)) {
            if (strstr($values, ',')) {
                $valueTemp = array_map('trim', explode(',', $values));
            } else {
                $valueTemp = trim($values);
            }
            $values = array("keywords" => $valueTemp);
        }
        
        if(!empty($values) && array_key_exists("keywords",$values)){
            $this->keywords = array_unique( $values['keywords'] );
        }
    }

    public function __toString()
    {
        return implode( ', ', $this->keywords );
    }
}
