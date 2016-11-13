<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('file');
	}
	
	function index()
	{
		$this->load->view('upload_form');
	}

    function do_upload()
	{
		$config['upload_path'] = './temp_upload/';
		$config['allowed_types'] = 'xls';
                
		$this->load->library('upload', $config);
                

		if ( ! $this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());
			
		}
		else
		{
            $data = array('error' => false);
			$upload_data = $this->upload->data();

            $this->load->library('excel_reader');
			$this->excel_reader->setOutputEncoding('CP1251');

			$file =  $upload_data['full_path'];
			$this->excel_reader->read($file);
			error_reporting(E_ALL ^ E_NOTICE);

			// Sheet 1
			$data = $this->excel_reader->sheets[0] ;
                        $dataexcel = Array();
			for ($i = 1; $i <= $data['numRows']; $i++) {

                            if($data['cells'][$i][1] == '') break;
                            $dataexcel[$i-1]['nama'] = $data['cells'][$i][1];
                            $dataexcel[$i-1]['alamat'] = $data['cells'][$i][2];

			}
                        
                        
            delete_files($upload_data['file_path']);
            $this->load->model('User_model');
            $this->User_model->tambahuser($dataexcel);
            $data['user'] = $this->User_model->getuser();
		}
        $this->load->view('hasil', $data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */