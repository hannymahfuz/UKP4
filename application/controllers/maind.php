<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maind extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$this->load->model('Ukp4Model');

        $data1['query'] = $this->Ukp4Model->Menu();
        $data1['queryNews'] = $this->Ukp4Model->News();
        $data1['queryCodess'] = $this->Ukp4Model->Kategori();
	    $data1['queryDetail'] = $this->Ukp4Model->Detail(1,1);
        $data1['queryKomentar'] = $this->Ukp4Model->Komentar(1,1);
		$data1['comment'] = $this->__comment();
		$this->load->view('v_utama',$data1);
		//$this->load->view('v_header',$data1);
		//$this->load->view('v_kiri',$data2);
		//$this->load->view('v_main',$data3);
		//$this->load->view('v_mainTengah',$data4);
		//$this->load->view('v_mainBawah');
		
		//$this->load->view('v_kananAtas',$data5);
		//$this->load->view('v_kananBawah');
		//$this->load->view('v_footer');
	}
	
	public function detail($jenis)
	{
		$this->load->model('Ukp4Model');

        // $data1['query'] = $this->Ukp4Model->Menu();
        // $data5['query'] = $this->Ukp4Model->News();
        // $data2['query'] = $this->Ukp4Model->Kategori();
        // $data3['query'] = $this->Ukp4Model->Detail(1,$jenis);
		
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

        // $data4['query'] = $this->Ukp4Model->Komentar($jenis,$catag);
	

        $data1['query'] = $this->Ukp4Model->Menu();
        $data1['queryNews'] = $this->Ukp4Model->News();
        $data1['queryCodess'] = $this->Ukp4Model->Kategori();
	    $data1['queryDetail'] = $this->Ukp4Model->Detail(1,$jenis);
        $data1['queryKomentar'] = $this->Ukp4Model->Komentar($jenis,$catag);
		$data1['comment'] = $this->__comment();
		$this->load->view('v_utama',$data1);
		
		// $this->load->view('v_header',$data1);
		// $this->load->view('v_kiri',$data2);
		// $this->load->view('v_main',$data3);
		// $this->load->view('v_mainTengah',$data4);
		// $this->load->view('v_mainBawah');
		// $this->load->view('v_kananAtas',$data5);

		// $this->load->view('v_kananBawah');
		// $this->load->view('v_footer');
	
	}
	
	public function komentar($jenis,$detil)
	{
		$this->load->model('Ukp4Model');

        // $data1['query'] = $this->Ukp4Model->Menu();
        // $data5['query'] = $this->Ukp4Model->News();
        // $data2['query'] = $this->Ukp4Model->Kategori();
        // $data3['query'] = $this->Ukp4Model->Detail(1,$jenis);
        // $data4['query'] = $this->Ukp4Model->Komentar($jenis,$detil);
	

		
		// $this->load->view('v_header',$data1);
		// $this->load->view('v_kiri',$data2);
		// $this->load->view('v_main',$data3);
		// $this->load->view('v_mainTengah',$data4);
		// $this->load->view('v_mainBawah');
		// $this->load->view('v_kananAtas',$data5);

		// $this->load->view('v_kananBawah');
		// $this->load->view('v_footer');
        $data1['query'] = $this->Ukp4Model->Menu();
        $data1['queryNews'] = $this->Ukp4Model->News();
        $data1['queryCodess'] = $this->Ukp4Model->Kategori();
	    $data1['queryDetail'] = $this->Ukp4Model->Detail(1,$jenis);
        $data1['queryKomentar'] = $this->Ukp4Model->Komentar($jenis,$detil);
		$data1['comment'] = $this->__comment();
		$this->load->view('v_utama',$data1);
	
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
	function saveComment(){

		// $rules  = $this->_get_rules();
		// $fields = $this->_get_fieldsname();
		// $type = $this->input->post('txtTYPESS');
		// $this->validation->set_rules($rules);
		  // $this->validation->set_fields($fields);
		// //echo "detanto " . $this->input->post('captcha');
			// if ($this->validation->run() == FALSE)
			// {
				// //$this->session->set_flashdata(array('subscribe_msg'=>'<div id="msgw">'.$this->validation->error_string.'</div>'));
		  // $this->session->set_flashdata('subscribe_msg', $this->validation->error_string);
		  // redirect('en/show/'. $type  .'/' . $this->input->post('txtIDENTS') . '#comments');
		// }else{
			$input = array(
			'COM_NAMAS' => $this->input->post('txtNAMESS'),
			'COM_ARTIK' => '1',
			'COM_COMEN'=> $this->input->post('txtCOMMEN'));
			$this->db->insert('T_WEB_COMENT', $input);

			//echo $prefix ;
			//echo $this->db->last_query();
			redirect('/maind/');
			//redirect('en/show/'. $type  .'/' . $this->input->post('txtIDENTS') . '#comment');
		//}	
	}
  function __comment(){
    $type = 1;
    $limit = 3;
    //$capcay = $this->common->_make_captcha();
    //$capcay= explode("~", $capcay);
    $cap_img = "";    
    $html ="<div>";
	$ident = 1;
    $rsComment = $this->Ukp4Model->getComment($ident, $type, $limit );
	
    foreach ($rsComment->result() as $rowComment)
    {
		$username = ($rowComment->USR_NAMES == "" ? $rowComment->COM_NAMAS : $rowComment->USR_NAMES);
      $html .= "<div class=address style='padding: 5px 5px 5px 0px;'>" . $username ."</div>
                <div class=comment style=''>" . $rowComment->COM_COMEN ."</div>
                <div style='padding: 10px 10px 10px 0px;'><img src='/images/pembatashotel.jpg' width=530px height=1></div>
                ";
				// echo "Sdfasdf";
    }
    $html .="</div>";
    $countComment = $this->Ukp4Model->getComment($ident, $type, '',1);
    if($countComment>$limit){
      $html .="<div class=info>See All Comment($countComment)</div>";
    }
    $html .="<div class=info>Add Comment
    <form name=frm1 action='/maind/saveComment' METHOD=post>
    <table border=0>
      <tr><td>Name</td><td><input type=text name=txtNAMESS></td></tr>
      <input type=HIDDEN name=txtIDENTS value=$ident readonly>
      </td></tr>
      <tr><td>Comment</td></tr>
      <tr><td colspan=2><TEXTAREA name=txtCOMMEN cols=50></TEXTAREA></td></tr>
      <tr><td colspan=2><br>" . $cap_img . "";
      $html .="</td></tr>
      <tr><Td colspan=3><br>Pleas input the text from the image<input type=text name=captcha value='' size=40 /></td></tr>
      <tr><td colspan=2><a href=\"javascript:document.frm1.submit();\" style=\"color:#000000\" ><img src=/images/submiticon.jpeg height=20 border=0>&nbsp;Save</a></td></tr>
    </table>
    </form>
    </div><br><br><br>";
    
    return $html;    
  }
	
}

