<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->model('Ukp4Model');

        $data1['query'] = $this->Ukp4Model->Menu();
        $data5['query'] = $this->Ukp4Model->News();
        $data2['query'] = $this->Ukp4Model->Kategori();
	    $data3['query'] = $this->Ukp4Model->Detail(1,1);
        $data4['query'] = $this->Ukp4Model->Komentar(1,1);

		
		$this->load->view('v_header',$data1);
		$this->load->view('v_kiri',$data2);
		$this->load->view('v_main',$data3);
		$this->load->view('v_mainTengah',$data4);
		$this->load->view('v_mainBawah');
		
		$this->load->view('v_kananAtas',$data5);
		$this->load->view('v_kananBawah');
		$this->load->view('v_footer');
	}
	
	public function detail($jenis)
	{
		$this->load->model('Ukp4Model');

        $data1['query'] = $this->Ukp4Model->Menu();
        $data5['query'] = $this->Ukp4Model->News();
        $data2['query'] = $this->Ukp4Model->Kategori();
        $data3['query'] = $this->Ukp4Model->Detail(1,$jenis);
		
		//$query = $this->Ukp4Model->Detail(1,$jenis);
		$query = $this->db->query("SELECT * , IFNULL(min(DET_IDENTX),0) DET_IDENTX
									FROM T_WEB_UKP4C a
									LEFT OUTER JOIN T_WEB_UKP4D b
										ON a.CAT_CODESS=b.DET_JNSIDN
                  LEFT OUTER JOIN (
                                    SELECT CAT_IDENTS, min(DET_IDENTS) DET_IDENTX 
                                    FROM T_WEB_UKP4C a
                                    LEFT OUTER JOIN T_WEB_UKP4D b
                                        ON a.CAT_CODESS=b.DET_JNSIDN
                                    WHERE CAT_CODESS  =".$jenis." AND CAT_JNSIDN = 1
                                    ) c
                    ON a.CAT_IDENTS=c.CAT_IDENTS
									WHERE CAT_CODESS  =".$jenis." AND CAT_JNSIDN = 1");
		
		$row = $query->row();
		$catag = $row->DET_IDENTX;

        $data4['query'] = $this->Ukp4Model->Komentar($jenis,$catag);
	

		
		$this->load->view('v_header',$data1);
		$this->load->view('v_kiri',$data2);
		$this->load->view('v_main',$data3);
		$this->load->view('v_mainTengah',$data4);
		$this->load->view('v_mainBawah');
		$this->load->view('v_kananAtas',$data5);

		$this->load->view('v_kananBawah');
		$this->load->view('v_footer');
	
	}
	
	public function komentar($jenis,$detil)
	{

        $data1['query'] = $this->Ukp4Model->Menu();
        $data5['query'] = $this->Ukp4Model->News();
        $data2['query'] = $this->Ukp4Model->Kategori();
        $data3['query'] = $this->Ukp4Model->Detail(1,$jenis);
        $data4['query'] = $this->Ukp4Model->Komentar($jenis,$detil);
	

		
		$this->load->view('v_header',$data1);
		$this->load->view('v_kiri',$data2);
		$this->load->view('v_main',$data3);
		$this->load->view('v_mainTengah',$data4);
		$this->load->view('v_mainBawah');
		$this->load->view('v_kananAtas',$data5);

		$this->load->view('v_kananBawah');
		$this->load->view('v_footer');
	
	}
	
	public function pie()
	{
	$this->load->library('piechart');

	// Set variables etc
	$this->piechart->showLabel(true);
	$this->piechart->showPercent(true);
	$this->piechart->showParts(true);
	$this->piechart->setWidth(250);
	$this->piechart->setFont('C:/Windows/Fonts/tahoma.ttf', 9);
	$this->piechart->setLegend('round');
	$this->piechart->setData( array(14,5,11,10,20) );
	$this->piechart->setLabels( array('Room 14','ICT Suite','Room 13','Study Centre','Technology Suite') );

	$school_id = 123;
	// Make unique filename
//	$hash = md5("report-pie-".$this->school_id);
	$hash = md5("report-pie-");

	// Generate pie and save it
	$this->piechart->Generate($this->config->item('base_url')."images/reports/$hash.png");
			
	$layout['title'] = 'Reports';
	$layout['showtitle'] = $layout['title'];
	$layout['body'] = $this->load->view('reports/reports_index', NULL, True);
	$layout['body'] .= '<img src="webroot/images/reports/'.$hash.'.png">';
			
	$this->load->view('layout', $layout);  
	}
}

