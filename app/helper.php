<?php
function who(){
	if(session()->get('login')){
		return \App\Models\Tutors::find(session()->get('who'));
	}

	return false;
}

function student_class($i = false){
	$type = array (
		'1' => "Class One",
		'2' => "Class Two",
		'3' => "Class Three",
		'4' => "Class Four",
		'5' => "Class Five",
		'6' => "Class Six",
		'7' => "Class Seven",
		'8' => "Class Eight",
		'9' => "Class Nine",
		'10' => "S.S.C",
		'11' => "HSC 1st Year",
		'12' => "HSC 2nd Year",
		'13' => "Honours 1st Year",
		'14' => "Honours 2nd Year",
		'15' => "Honours 3rd Year",
		'16' => "Honours 4th Year",
		'17' => "KG",
		'18' => "A Level",
		'19' => "O Level",
		'20' => "Medicale Admission",
		'21' => "Engineering Admission",
		'22' => "Versity Admission",
		
		
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function student_category($i = false){
	$type = array (
		'0' => "Bangla Medium",
		'1' => "English Medium",
		'2' => "English Version",
		
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}


function tutoring_time($i = false){
	$type = array (
			'8' => "30 minutes",
			'1' => "1 hour",
			'9' => "1 hour and 30 minutes",
			'2' => "2 hours",
			'10' => "2 hour and 30 minutes",
			'3' => "3 hours",
			'11' => "3 hour and 30 minutes",
			'4' => "4 hours",
			'12' => "4 hour and 30 minutes",
			'5' => "5 hours",
			'13' => "5 hour and 30 minutes",
			'6' => "6 hours",
			'14' => "6 hour and 30 minutes",
			'7' => "7 hours",
		
		
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function weekly_time($i = false){
	$type = array (
		'1' => "1 day per week",
		'2' => "2 days per week",
		'3' => "3 days per week",
		'4' => "4 days per week",
		'5' => "5 days per week",
		'6' => "6 days per week",
		'7' => "7 days per week",
		'8' => "1 day in Two week",
		'9' => "1 day in a Month",
		
		
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function gender($i = false){
	$type = array (
		'0' => "Male",
		'1' => "Female",
		'2' => "others",
		
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}



function interestedIn($i = false){
	$type = array (
		'2' => "Both",
		'0' => "Male",
		'1' => "Female",
		
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}


function sendMessage($message,$to){
	$token = "79432c9e0afad786d880b96957985439";
    $url = "http://sms.greenweb.com.bd/api.php";
    $data= array(
	    'to' => "$to",
	    'message'=> "$message",
	    'token'=> "$token"
    );
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);


    if($smsresult){
    	return true;
    }else{
    	return false;
    }
}

function fiscalWeeklyCalendar($month,$week)
{
	$week=\App\Models\FiscalYearMonthWeeks::where(['month_id'=>$month,'week'=>$week])->first();
	if(isset($week->id)){
		return $week;
	}else{
		return false;
	}
}
function Wards($i = false){
	$type = array (
		'0' => "১",
		'1' => "২",
		'2' => "৩",
		'3' => "৪",
		'4' => "৫",
		'5' => "৬",
		'6' => "৭",
		'7' => "৮",
		'8' => "৯",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function bloodgroup($i = false){
	$type = array (
		'0' => "A+",
		'1' => "A-",
		'2' => "B+",
		'3' => "B-",
		'4' => "AB+",
		'5' => "AB-",
		'6' => "O+",
		'7' => "O-",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}
function marraige($i = false){
	$type = array (
		'0' => "বিবাহিত",
		'1' => "অবিবাহিত",
		
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function appmodule($module)
{
    $route=\Route::getFacadeRoot()->current()->uri();
    $explode=explode('/',$route);
    if(count($explode)>=1){
        $route=$explode[0];
    }
    
    $id =   \Auth::guard('admin')->user();
    
    if($id->suser_level=="1"){
        return true;
    }
    
    if($id->id=="1000"){
        return true;
    }

    $checkmain=\DB::table('tbl_appmodulepriority')
        ->join('tbl_appmodule','tbl_appmodulepriority.amp_appmid','=','tbl_appmodule.appm_id')
        ->join('adminmainmenu','tbl_appmodule.appm_menuid','=','adminmainmenu.id')
        ->where(['tbl_appmodule.appm_name'=>$module,'adminmainmenu.routeName'=>$route,'tbl_appmodulepriority.amp_prid'=>$id->suser_level])
        ->first();
    if(isset($checkmain->amp_prid)){
        return true;
    }else{
    $checksub=\DB::table('tbl_appmodulepriority')
        ->join('tbl_appmodule','tbl_appmodulepriority.amp_appmid','=','tbl_appmodule.appm_id')
        ->join('adminsubmenu','tbl_appmodule.appm_submenuid','=','adminsubmenu.id')
        ->where(['tbl_appmodule.appm_name'=>$module,'adminsubmenu.routeName'=>$route,'tbl_appmodulepriority.amp_prid'=>$id->suser_level])
        ->first();
        if(isset($checksub->amp_prid)){
            return true;
        }else{
            return false;
        }
    }
 }

function fiscalYearMonths()
{
    return array(
    	'01',
    	'02',
    	'03',
    	'04',
    	'05',
    	'06',
    	'07',
    	'08',
    	'09',
    	'10',
    	'11',
    	'12',
    );
}

function whoops($msg = 'Whoops! Something went wrong!')
{
    session()->flash('error',$msg);
}

function admin_id(){
	return \Auth::guard('admin')->user()->id;
}

function depreciation_methods($i = false)
{	

	$depreciation = array(
		'D' => "Declining balance",
		'S' => "Straight line",
		'N' => "Sum of the Year Digits",
		'O' => "One-time",
		
	);
	if($i){
		if(isset($depreciation[$i])){
			return $depreciation[$i];
		}else{
			return '';
		}
	}
	return $depreciation;
}


function check($parent,$child)
{
	if(!empty($parent) && !empty($child))
	{
		if(isset($parent)){
			return $parent->$child;
		}
	}
}

function generatePDF($view,$data,$filename,$paper='a4',$orientation='landscape')
{
    return $pdf = \PDF::loadView($view, $data)->setPaper($paper,$orientation)->setWarnings(false)->save(public_path('pdf/'.$filename.'.pdf'))->stream('pdf/'.$filename.'.pdf');
    // return $pdf->download('pdf/'.$filename.'.pdf');
}

function count_dimension(){
    $SysPrefs=\App\Models\SysPrefs::where('name','default_dim_required')->first();
    if(isset($SysPrefs->value)){
        return $SysPrefs->value;
    }
    
    return 1;
}
function credit($key,$value){
	if($value<0){
		if($key>1 && $key%2==0){
			$value=$value*-1;
		}
	}
	return $value;
}
function decimal($value)
{
	return number_format((float)($value), 2, '.', '');
}
function inWord($number) {
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'System only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . inWord(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . inWord($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = inWord($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= inWord($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function success($value,$msg=false)
{
	if(isset($value)){
		session()->flash('success',(isset($msg)) ? $msg : 'Your desired Operation has been Successful.' );
	}else{
		session()->flash('error','Whoops! Something went wrong!');
	}
}

function comment($type,$id,$date_,$memo_)
{
	if($memo_!=""){
		\App\Models\Comments::insert([
			"type"=>$type,
			"id"=>$id,
			"date_"=>$date_,
			"memo_"=>$memo_
		]);
	}
}

function duration($start_date,$end_date){
    if(strtotime($start_date) > strtotime($end_date)){
    	return false;
	}
   $start_date = new \DateTime($start_date);
   $end_date = new \DateTime($end_date);
   $difference=$end_date->diff($start_date);
   return $difference->days+1;
}

function typeName($type = false){
    $names=array (
		'0' => "Journal Entry",
		'1' => "Bank Payment",
		'2' => "Bank Deposit",
		'4' => "Funds Transfer",
		'10' => "Sales Invoice",
		'11' => "Customer Credit Note",
		'12' => "Customer Payment",
		'13' => "Delivery Note",
		'16' => "Location Transfer",
		'17' => "Inventory Adjustment",
		'18' => "Purchase Order",
		'20' => "Supplier Invoice",
		'21' => "Supplier Credit Note",
		'22' => "Supplier Payment",
		'25' => "Purchase Order Delivery",
		'26' => "Work Order",
		'28' => "Work Order Issue",
		'29' => "Work Order Production",
		'30' => "Sales Order",
		'32' => "Sales Quotation",
		'35' => "Cost Update",
		'40' => "Dimension",
		'91' => "STATEMENT",
		'92' => "CHEQUE",
		'201' => "Get Pass In/Out",
	); 
    if($type){
		if(isset($names[$type])){
			return $names[$type];
		}else{
			return '';
		}
	}
	
	return $names;
}

function orderTypeVariation($i = false)
{
	$paymentTerms = array(
		'1' => "Direct",
		'2' => "Sub Contract",
		'3' => "Internal",
		
	);
	if($i){
		if(isset($paymentTerms[$i])){
			return $paymentTerms[$i];
		}else{
			return '';
		}
	}
	return $paymentTerms;
}

function LCType($i = false)
{
	$LCType = array(
		'1' => "Initial LC",
		'2' => "Austomer Acceptance",
		'3' => "Bank Maturity",
		'4' => "Purchase Realization",
		
	);
	if($i){
		if(isset($LCType[$i])){
			return $LCType[$i];
		}else{
			return '';
		}
	}
	return $LCType;
}



function fileInfo($file)
{
	if(isset($file)){
		return $image = array(
	    	'name' => $file->getClientOriginalName(), 
	    	'type' => $file->getClientMimeType(), 
	    	'size' => $file->getClientSize(), 
	    	'extension' => $file->getClientOriginalExtension(), 
	    );
	}else{
		return $image = array(
	    	'name' => '0', 
	    	'type' => '0', 
	    	'size' => '0', 
	    	'extension' => '0', 
	    );
	}
    
}

function fileUpload($file,$destination,$name)
{
    $upload=$file->move(public_path('/'.$destination), $name);
    return $upload;
}

function getfileSize($size)
{
	if($size<1024){
		$size=$size.' KB';
	}elseif($size>=1024){
		$size=number_format((float)($size/1024), 2, '.', '').' MB';
	}else{
		$size='Unknown Size';
	}
	return $size;
}

define('ST_JOURNAL', 0);

define('ST_BANKPAYMENT', 1);
define('ST_BANKDEPOSIT', 2);
define('ST_BANKTRANSFER', 4);

define('ST_SALESINVOICE', 10);
define('ST_CUSTCREDIT', 11);
define('ST_CUSTPAYMENT', 12);
define('ST_CUSTDELIVERY', 13);

define('ST_LOCTRANSFER', 16);
define('ST_INVADJUST', 17);

define('ST_PURCHORDER', 18);
define('ST_SUPPINVOICE', 20);
define('ST_SUPPCREDIT', 21);
define('ST_SUPPAYMENT', 22);
define('ST_SUPPRECEIVE', 25);

define('ST_WORKORDER', 26);
define('ST_MANUISSUE', 28);
define('ST_MANURECEIVE', 29);

//
//	Depreciation period types
//
define('FA_MONTHLY', 0);
define('FA_YEARLY', 1);

define('ST_SALESORDER', 30);
define('ST_SALESQUOTE', 32);
define('ST_COSTUPDATE', 35);
define('ST_DIMENSION', 40);

// Don't include these defines in the $systypes_array.
// They are used for documents only.
define ('ST_STATEMENT', 91);
define ('ST_CHEQUE', 92);

define ('GET_PASS', 201);


//----------------------------------------------------------------------------------
// Types of stock items
function stockTypes($i = false)
{
	$stock_types = array(
		'M' => "Manufactured",
		'B' => "Purchased",
		'D' => "Service"
	);
	if($i){
		return $stock_types[$i];
	}
	return $stock_types;
}

//payment terms
function paymentTerms($i = false)
{
	$paymentTerms = array(
		'1' => "Prepayment",
		'2' => "Cash",
		'3' => "After No. of Days",
		'4' => "Day In Following Month"
	);
	if($i){
		if(isset($paymentTerms[$i])){
			return $paymentTerms[$i];
		}else{
			return '';
		}
	}
	return $paymentTerms;
}

function proFormaInvoiceType($i = false)
{
	$paymentTerms = array(
		'1' => "Direct",
		'0' => "Orderwise",
		
	);
	if($i){
		if(isset($paymentTerms[$i])){
			return $paymentTerms[$i];
		}else{
			return '';
		}
	}
	return $paymentTerms;
}


function loanTypes($i = false)
{
	$loanTypes = array(
		'1' => "SME",
		'2' => "CC"
	);
	if($i){
		if(isset($loanTypes[$i])){
			return $loanTypes[$i];
		}else{
			return '';
		}
	}
	return $loanTypes;
}


//image previewer
function image($location){ 
	if(file_exists(public_path()."/".$location)){
		return '<img src="'.asset("public/$location").'" class="img-thumbnail" width="50" >';
	}else{
		return '<img src="'.asset('public/img/akaunting-logo-green.png').'" class="img-thumbnail" width="50" >';
	}
}

function systemTypeArry($i = false){
	$systypes_array = array (
		ST_JOURNAL => "Journal Entry",
		ST_BANKPAYMENT => "Bank Payment",
		ST_BANKDEPOSIT => "Bank Deposit",
		ST_BANKTRANSFER => "Funds Transfer",
		ST_SALESINVOICE => "Sales Invoice",
		ST_CUSTCREDIT => "Customer Credit Note",
		ST_CUSTPAYMENT => "Customer Payment",
		ST_CUSTDELIVERY => "Delivery Note",
		ST_LOCTRANSFER => "Location Transfer",
		ST_INVADJUST => "Inventory Adjustment",
		ST_PURCHORDER => "Purchase Order",
		ST_SUPPINVOICE => "Supplier Invoice",
		ST_SUPPCREDIT => "Supplier Credit Note",
		ST_SUPPAYMENT => "Supplier Payment",
		ST_SUPPRECEIVE => "Purchase Order Delivery",
		ST_WORKORDER => "Work Order",
		ST_MANUISSUE => "Work Order Issue",
		ST_MANURECEIVE => "Work Order Production",
		ST_SALESORDER => "Sales Order",
		ST_SALESQUOTE => "Sales Quotation",
		ST_COSTUPDATE => "Cost Update",
		ST_DIMENSION => "Dimension",
	); 

	if($i){
		if(isset($systypes_array[$i]))
			return $systypes_array[$i];
		else
			return false;
	}

	return $systypes_array;
}

function faSystemArry($i = false){
	$fa_systypes_array = array (
		ST_INVADJUST => "Fixed Assets Disposal",
		ST_COSTUPDATE => "Fixed Assets Revaluation",
	);
	if($i)
		if(isset($fa_systypes_array[$i]))
			return $fa_systypes_array[$i];
		else
			return false;

	return $fa_systypes_array;
}

function accountType($i = false){
	$type = array (
		'0' => "Savings Account",
		'1' => "Chequing Account",
		'2' => "Credit Account",
		'3' => "Cash Account",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

//work type
function workType($i = false)
{
	$paymentTerms = array(
		'1' => "Assemble",
		'2' => "Unassemble",
		'3' => "Advanced Manufectures",
		
	);
	if($i){
		if(isset($paymentTerms[$i])){
			return $paymentTerms[$i];
		}else{
			return '';
		}
	}
	return $paymentTerms;
}
//work type

function creditType($i = false){
	$type = array (
		'0' => "Items Returned to Inventiry Location",
		'1' => "Items Written Off",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function PamentMethod($i = false)
{
	$paymentMethod = array(
		'1' => "LC",
		'2' => "TT",
		'3' => "Cash",
		'4' => "Cheque",
		
	);
	if($i){
		if(isset($paymentMethod[$i])){
			return $paymentMethod[$i];
		}else{
			return '';
		}
	}
	return $paymentMethod;
} 

function template($i = false){
	$type = array (
		'6' => "Amount 450",
		
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function classType($i = false){
	$type = array (
		'0' => "Assests",
		'1' => "Liabilities",
		'2' => "Equity",
		'3' => "Income",
		'4' => "Costs of Goods Sold",
		'5' => "Expense",
		'6' => "Others",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function accountCurrency($i = false){
	$type = array (
		"CAD" => "Canadian Dollars",
		"COP" => "Colombian Peso",
		"EGP" => "Egyption Pound",
		"EUR" => "Euro",
		"GHS" => "Ghana Cedi",
		"INR" => "Indian Rupee",
		"ILS" => "Israeli new shekel",
		"SEK" => "Krona",
		"KWD" => "Kuwaiti Dinar",
		"NGN" => "Naira",
		"PKR" => "Pakistani Rupees",
		"php" => "peso",
		"PES" => "Phillipine Peso",
		"PLK" => "Polski Zloty",
		"GBP" => "Pounds",
		"QAR" => "Qatar Riyals",
		"IDR" => "Rupiah",
		"ZAR" => "South African Rand",
		"LKR" => "Sri Lankan Rupees",
		"TZS" => "Tanzania Shillings",
		"Ugx" => "Uganda Shillings",
		"USD" => "USD",
		"BDT" => "Bangladeshi Taka",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
}





function showDate($date){
	return date("F jS, Y", strtotime($date));
}

function datetime($date){
	if(strtotime($date)>0){
		return date("j M Y, g:i a", strtotime($date));
	}
}

function jmyOnlyDate($date){
	if(strtotime($date)>0){
		return date("j M Y", strtotime($date));
	}
}

function onlyDate($date){
	return date("Y-m-d", strtotime($date));
}

function language($i = false){
	$language = array (
		'0' => "System Default",
		'1' => "English",
		'2' => "Bangla",
	);
	if($i)
		if(isset($language[$i]))
			return $language[$i];
		else
			return false;

	return $language;
}

function defaultBool($i = false){
	$bolean = array (
		'0' => "No",
		'1' => "Yes",
	);
	if($i)
		if(isset($bolean[$i]))
			return $bolean[$i];
		else
			return false;

	return $bolean;
}

function uniquecode($prefix,$length,$table,$field)
{
	$prefix_length=strlen($prefix);
    $max_id=\DB::table($table)->max($field);
    $prefix_length=strlen($prefix);
    $only_id=substr($max_id,$prefix_length);
    $new=(int)($only_id);
    $new++;
    $number_of_zero=$length-$prefix_length-strlen($new);
    $zero=str_repeat("0", $number_of_zero);
    $made_id=$prefix.$zero.$new;
    return $made_id;
}

