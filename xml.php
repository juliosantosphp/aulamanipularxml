<html>
    <head>
        <meta charset="UTF-8">
        <title>Aula de manipulação de xml</title>
    </head>
    <body>
        <?php
        /*
        $xml = simplexml_load_file("file.xml");
        
        //print_r($xml);
        
        echo "Alguma coisa: ".$xml->codigo."<br/>";
        echo "Alguma coisa: ".$xml->pressao."<br/>";
        echo "Alguma coisa: ".$xml->tempo."<br/>";
        
        
         */
        
        // transfomando array em xml
        
        
        function array_to_xml($data, &$xml_data) {
            foreach ($data as $key => $value) {
                if(is_array($value)) {
                    if(is_numeric($key)) {
                        $key = 'item'.$key;
                    }
                    $subnode = $xml_data->addChild($key);
                    $array_to_xml($value, $subnode);
                } else {
                    $xml_data->addChild($key, htmlspecialchars($value));
                }
            }
        }
        $data = array(
            "nome" => "julio",
            "idade" => 09,
            "sobrenome" => "cesar"
        );
        //$data = array('total_stud' => 500);
        
        $xml_data = new SimpleXMLElement('<data/>');
        
        array_to_xml($data, $xml_data);
        
        $result = $xml_data->asXML();
        
        echo $result;
        
        ?>
    </body>
</html>