<?php
/**
 * HtmlGenerators
 * Contain method for generate html tools
 * @author Miolynet
 */
class HtmlGenerators {

    /**
     * Generate combobox with array object
     * @param string $itemName
     * Generate combobox name
     * @param Array $sourceElement
     * Item source of combobox values
     * @param string $propertyValueName
     * Name of value element
     * @param string $propertyDisplayName
     * Name of display text element
     * @param bool $isFirstSelected
     * Auto select first item
     * <<Default TRUE>>
     * @return string Html code
     */
    public static function SqlComboBox($itemName, $sourceElement, $propertyValueName, $propertyDisplayName, $isFirstSelected = TRUE){
        $htmlCode = "<select name=$itemName>";
        $isFirstElement = TRUE;
        while($row = mysql_fetch_array($sourceElement))
        {
            $htmlCode.= "<option value=$row[$propertyValueName]";
            if($isFirstElement && $isFirstSelected) $htmlCode.= " selected";
            $htmlCode.= ">$row[$propertyDisplayName]</option>";
        }
        $htmlCode.= "</select>";
        
        return $htmlCode;
    }

    public static function LinkMenu($displayText, $Url, $minimumPrivilegeLevel, $displayOnLoinOnly = false){
        
    }

}
?>
