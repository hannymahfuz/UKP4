<?php
class Textxml extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }
	function index()
	{
		//load the parser library
		$this->load->library('parser');

               $data['title'] = 'Parsing XML using Simplexml class of CodeIgniter';
			   $data['products'] = $this->_getXML('test');
$this->_getXML2('test2');
            
	       $this->parser->parse('table_view', $data);
	}
    function _getXML($fname)
    {
// Array ( [monitor] => 
			// Array ( [@attributes] => 
				// Array ( [nid] => 2 [name] => Penanganan Transportasi Jabodetabek (2010-2011) ) 
					// [prioritas] => Array ( [@attributes] => Array ( [code] => L1 [name] => Kelompok Sarana dan Prasarana Transportasi ) ) ) ) 
                $filename = $fname.'.xml';
                $xmlfile="./xml/".$filename;
                $xmlRaw = file_get_contents($xmlfile);
                $this->load->library('simplexml');
                $xmlData = $this->simplexml->xml_parse($xmlRaw);
				print_r($xmlData);
				$result = "<table>";
             foreach($xmlData['item'] as $row)  
             {  
  
$result .= '<tr>';  
$result .= '<td>'.$row['id'].'</td>';  
$result .= '<td>'.$row['name'].'</td>';  
$result .= '<td>'.$row['category'].'</td>';  
$result .= '<td>$ '.$row['price'].'</td>';  
$result .= '</tr>';  
  
             }  
				$result .= "/<table>";
              echo $result;
        }	
    function _getXML2($fname)
    {
                $filename = $fname.'.xml';
                $xmlfile="./xml/".$filename;
                $xmlRaw = file_get_contents($xmlfile);
                $this->load->library('simplexml');
                $xmlData = $this->simplexml->xml_parse($xmlRaw);
				var_dump($xmlData);
				echo "<Br><br><br>";
				$result = "<table>";
				// echo $xmlData['monitor']['@attributes']['nid'] ."<br>";
				// echo $xmlData['monitor']['@attributes']['name']."<br>";
/*
array(2) { 
	["@attributes"]=> array(1) { ["xmlns:xsi"]=> string(41) "http://www.w3.org/2001/XMLSchema-instance" } 
		["monitor"]=> array(2) { 
			["@attributes"]=> array(2) { 
				["nid"]=> string(1) "2" ["name"]=> string(47) "Penanganan Transportasi Jabodetabek (2010-2011)" } 
			["prioritas"]=> array(2) { 
				["@attributes"]=> array(2) { ["code"]=> string(2) "L1" ["name"]=> string(42) "Kelompok Sarana dan Prasarana Transportasi" } 
					["program"]=> array(1) { ["@attributes"]=> array(2) { ["code"]=> string(2) "P1" ["name"]=> string(37) "Memberlakukan electronic Road Pricing" } 
					}	 
			} 
		} 
	}
	
array(2) { 
	["@attributes"]=> array(1) { ["xmlns:xsi"]=> string(41) "http://www.w3.org/2001/XMLSchema-instance" } 
		["monitor"]=> array(2) { 
			["@attributes"]=> array(2) { ["nid"]=> string(1) "2" ["name"]=> string(47) "Penanganan Transportasi Jabodetabek (2010-2011)" } 
			["prioritas"]=> array(2) { 
				["@attributes"]=> array(2) { ["code"]=> string(2) "L1" ["name"]=> string(42) "Kelompok Sarana dan Prasarana Transportasi" } 
				["program"]=> array(2) { 
					[0]=> array(2) { ["@attributes"]=> array(2) { ["code"]=> string(2) "P1" ["name"]=> string(37) "Memberlakukan electronic Road Pricing" } 
					["renaksi"]=> array(4) { 
						[0]=> array(1) { ["@attributes"]=> array(2) { ["code"]=> string(2) "A1" ["name"]=> string(56) "Penerbitan dasar hukum penerapan Electronic Road Pricing" } } 
						[1]=> array(1) { ["@attributes"]=> array(2) { ["code"]=> string(2) "A2" ["name"]=> string(55) "Usulan penetapan wilayah Electronic Road Pricing di DKI" } } 
						[2]=> array(1) { ["@attributes"]=> array(2) { ["code"]=> string(2) "A3" ["name"]=> string(69) "Sosialisasi kebijakan Electronic Road Pricing di wilayah Provinsi DKI" } } 
						[3]=> array(1) { ["@attributes"]=> array(2) { ["code"]=> string(2) "A4" ["name"]=> string(66) "Penyediaan dan pemasangan sarana-prasarana Electronic Road Pricing" } } } } 
					[1]=> array(1) { ["@attributes"]=> array(2) { ["code"]=> string(2) "P2" ["name"]=> string(60) "Mengkaji kebijakan perparkiran on street dan penegakan hukum" } } } } } } 	
*/	
			$loop = 1;
			foreach($xmlData['monitor'] as $key=>$rowS)  
            {  
				echo "<ul>";
				if(isset($rowS['nid'])){
					echo "<li> " . $rowS['nid'] . "~" . $rowS['name'] . "</li>";
				}else{
					echo "<ul>";					
					foreach($rowS as $key1=>$row1){
						if(isset($row1['code'])){		
							echo "<li>" . $row1['code'] . ". " . $row1['name'] . "</li>";
						}else{
							$jumla = count($row1);
							echo "<ul>";
							for($x=0;$x<$jumla;$x++){
								echo "<li>". $row1[$x]["@attributes"]['code'] . "." . $row1[$x]["@attributes"]['name'] ."</li>";
								echo "<ul>";
								foreach($row1[$x] as $key2=>$row2){
									$jumla2 = count($row2);
									for($y=0;$y<$jumla2;$y++){
										if(isset($row2[$y]["@attributes"]['code'])){
											echo "<li>". $row2[$y]["@attributes"]['code'] . "." . $row2[$y]["@attributes"]['name'] ."</li>";
											foreach($row2[$y] as $key3=>$row3){
												if(isset($row3['kriteria'])){
													// echo "<ul>";
													// foreach($row3 as $key4=>$row4){
														// echo "<li>". $row4["@attributes"]['code'] . "." . $row4["@attributes"]['name'];
													// }
													// echo "</ul>";
													// print_r($row3['kriteria']);
												}
												
											}
										}
									}									
								}
								echo "</ul>";								
							}
							echo "</ul>";
							echo "</ul>";
							// foreach($row1 as $key2=>$row2){
								// echo "<li>" . $row2['code'] . ". " . $row2['name'] . "</li>";
							// }
							// echo "</ul>";
							
						}
					}
					echo "</ul>";
				}
				echo "</ul>";
				//echo "<br>" . $loop;
				$loop++; 
  
             }  
				$result .= "/<table>";
              echo $result;
        }	
}