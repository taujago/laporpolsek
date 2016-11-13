<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class PdfTable extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }


    public function Header() {
    $headerData = $this->getHeaderData();
    $this->SetFont('helvetica', '', 10);
    $this->writeHTML('');
	}

	// public function Footer() {
 //   // $headerData = $this->getFooterData();
 //    $this->SetFont('helvetica', '', 10);
 //    $this->writeHTML('<hr />');
	// }


    /*public function Footer() {

		$image_file = dirname(__FILE__)."/tcpdf/images/printed.jpg";
        $this->Image($image_file, 11, 285, 25, '' , 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

		// Position at 15 mm from bottom
		$this->SetY(-20);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, ' Halaman '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
		
		$cur_y = $this->y;
		$this->SetTextColorArray($this->footer_text_color);
		$line_width = (0.85 / $this->k);
		$this->SetLineStyle(array('width' => $line_width, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $this->footer_line_color));
		
	}


    function Footer(){
    	$cur_y = $this->y;
		$this->SetTextColorArray($this->footer_text_color);
		//set style for cell border
		$line_width = (0.85 / $this->k);
		$this->SetLineStyle(array('width' => $line_width, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $this->footer_line_color));
		//print document barcode
		$barcode = $this->getBarcode();
		if (!empty($barcode)) {
			$this->Ln($line_width);
			$barcode_width = round(($this->w - $this->original_lMargin - $this->original_rMargin) / 3);
			$style = array(
				'position' => $this->rtl?'R':'L',
				'align' => $this->rtl?'R':'L',
				'stretch' => false,
				'fitwidth' => true,
				'cellfitalign' => '',
				'border' => false,
				'padding' => 0,
				'fgcolor' => array(0,0,0),
				'bgcolor' => false,
				'text' => false
			);
			$this->write1DBarcode($barcode, 'C128', '', $cur_y + $line_width, '', (($this->footer_margin / 3) - $line_width), 0.3, $style, '');
		}
		$w_page = isset($this->l['w_page']) ? $this->l['w_page'].' ' : '';
		if (empty($this->pagegroups)) {
			$pagenumtxt = $w_page.$this->getAliasNumPage().' / '.$this->getAliasNbPages();
		} else {
			$pagenumtxt = $w_page.$this->getPageNumGroupAlias().' / '.$this->getPageGroupAlias();
		}
		$this->SetY($cur_y);
		//Print page number
		if ($this->getRTL()) {
			$this->SetX($this->original_rMargin);
			$this->Cell(0, 0, $pagenumtxt, 'T', 0, 'L');
		} else {
			$this->SetX($this->original_lMargin);
			$this->Cell(0, 0, $this->getAliasRightShift().$pagenumtxt, 'T', 0, 'R');
		}

		 	$image_file = dirname(__FILE__) . "/tcpdf/images/printed.jpg";
        $this->Image($image_file, 11, 285, 25, '' , 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);


    } */
     
}
