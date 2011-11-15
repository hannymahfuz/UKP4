<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ukp4Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function Menu()
    {
		$query = $this->db->get('T_MAS_APPMNU');
        return $query->result();
    }

	function News()
    {
		$query = $this->db->get('T_WEB_NEWSS',1);
        return $query->result();
    }

	function getComment($ident, $type, $limit=null, $count=null){
		if($limit!=""){
		  $this->db->limit($limit);
		}
		$this->db->select('*');
		$this->db->from('T_WEB_COMENT a');
		$this->db->join('T_MAS_USERO b', 'a.COM_USERS = b.USR_IDENTS', 'left outer');
		// $this->db->where('COM_ARTIK', 1);
		$query = $this->db->get();
		// echo $this->db->last_query();
		if($count==null){
		  return $query;    
		}else{
		  return $query->num_rows();      
		}
	}
	
    function Kategori()
    {
		$query = $this->db->get('T_WEB_UKP4C');
        return $query->result();
    }

	function Detail($jenis, $codes)
    {
		$query = $this->db->query('SELECT * , DET_IDENTX
									FROM T_WEB_UKP4C a
									LEFT OUTER JOIN T_WEB_UKP4D b
										ON a.CAT_CODESS=b.DET_JNSIDN
                  LEFT OUTER JOIN (
                                    SELECT CAT_IDENTS, min(DET_IDENTS) DET_IDENTX 
                                    FROM T_WEB_UKP4C a
                                    LEFT OUTER JOIN T_WEB_UKP4D b
                                        ON a.CAT_CODESS=b.DET_JNSIDN
                                    WHERE CAT_CODESS  ='.$codes.' AND CAT_JNSIDN = '.$jenis.'
                                    ) c
                    ON a.CAT_IDENTS=c.CAT_IDENTS
									WHERE CAT_CODESS  ='.$codes.' AND CAT_JNSIDN = '.$jenis
								);
        return $query->result();
    }

	function Komentar($jenis, $detil)
    {
		if ($jenis!=0 AND $detil!=0){
		$query = $this->db->query('SELECT * 
									FROM T_WEB_UKP4D b
									LEFT OUTER JOIN T_WEB_COMENT a
										ON a.COM_ARTIK=b.DET_IDENTS
									LEFT OUTER JOIN T_MAS_USERO c
										ON a.COM_USERS=c.USR_IDENTS
									WHERE DET_IDENTS  ='.$detil
								);
		}
		else{
		$query = $this->db->query('SELECT 0 USR_NAMES, 0 COM_COMEN ' 
								);
		}
        return $query->result();
    }
		
		function Time()
		{
			$query = $this->db->get('T_WEB_TIMES');
       return $query->result();
			
		}

		function TimeYears()
		{
//	$query = $this->db->query("SELECT DISTINCT date_format(tim_dates, '%Y') TIM_DATES
	$query = $this->db->query("SELECT *
														FROM T_WEB_TIMES
														ORDER BY TIM_DATES ASC"
														);
				//echo $this->db->last_query();
				return $query->result();
			
		}
	
}