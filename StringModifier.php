<?PHP

class StringModifier {

    public function modifyString($string){
        
        $symbols = array('$', '€', '£');
        $formattedPrice = str_replace($symbols, '', $string);
        return $formattedPrice;

    }

}

?>