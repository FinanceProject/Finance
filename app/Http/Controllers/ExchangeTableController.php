<?php

namespace App\Http\Controllers;

use App\Exchange;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yangqi\Htmldom\Htmldom;

class ExchangeTableController extends Controller
{
    /*
    *  ABBank
    *  ACB
    *  AgriBank
    *  BIDV
    *  MBBank
    *  SacomBank
    *  TechcomBank
    *  VietcomBank
    *  DongA
    * */
   function getExchange(Request $request){
       $type = $request->type;
       $array_result = array();
       if($type == "USD (Áp dụng đối với mệnh giá 50-100)" || $type ==''){
           $array_result = $this->getUSD();
       }
       if($type == 'EUR' ){
           $array_result = $this->getEUR();
       }
       if($type == "GBP"){
           $array_result = $this->getGBP();
       }
       if($type == "SGD" ){
           $array_result = $this->getSGD();
       }
       if($type == "HKD"){
           $array_result = $this->getHKD();
       }
       $json_data = array(
           "data"            => $array_result,
       );
       echo json_encode($json_data);
   }

    /*
     *
     * Get Giá trị tiền Dollar Mỹ - USD
     * */
   function getUSD(){
       /*MB Bank lỗi lúc nữa đêm, chưa sửa nên tạm thời để trống. vị trí của đồng USD trong MBBank là 2*/
       $array_USD = $this->getMoney(1,1,1,2,"",2,8,19,1);
       return $array_USD;
   }
    /*
     *
     * Get Giá trị tiền Euro - EUR
     * */
    function getEUR(){
        /*MB Bank lỗi lúc nữa đêm, chưa sửa nên tạm thời để trống. vị trí của đồng EUR trong MBBank là 5*/
        $array_EUR = $this->getMoney(3,5,3,5,"",5,15,5,5);
        return $array_EUR;
    }
    /*
     *
     * Get Giá trị tiền GBP - Bảng Anh
     * */
    function getGBP(){
        /*MB Bank lỗi lúc nữa đêm, chưa sửa nên tạm thời để trống. vị trí của đồng EUR trong MBBank là 6 Update 8h vẫn chưa vào được*/
        $array_GBP = $this->getMoney(4,7,4,6,"",6,12,6,6);
        return $array_GBP;
    }
    /*
         *
         * Get Giá trị tiền SGD - Tiền Singapor
         * */
    function getSGD(){
        /*MB Bank lỗi lúc nữa đêm, chưa sửa nên tạm thời để trống. vị trí của đồng EUR trong MBBank là 12 Update 8h vẫn chưa vào được*/
        $array_SGD = $this->getMoney('',9,9,13,"",8,14,17,10);
        return $array_SGD;
    }
    /*
     *
     * Get Giá trị tiền HKD - Tiền Hồng Kong
     * */
    function getHKD(){
        /*MB Bank lỗi lúc nữa đêm, chưa sửa nên tạm thời để trống. vị trí của đồng EUR trong MBBank là 8 Update 8h vẫn chưa vào được*/
        $array_HKD = $this->getMoney('',11,5,7,"",'',17,7,7);
        return $array_HKD;
    }
    /*
     * Hàm được tạo ra nhằm mục đích rút gọn quá trình thiết lập.
     * Dữ liệu nhập vào là vị trí của loại tiền đó trong bảng Tỷ giá của từng ngân hàng
     *  ABBank
     *  ACB
     *  AgriBank
     *  BIDV
     *  MBBank
     *  SacomBank
     *  TechcomBank
     *  VietcomBank
     *  DongA
     * */
   function getMoney($position_ABBank,$position_ACB,$position_AgriBank,$position_BIDV,$position_MBBank,$position_SacomBank,$position_TechcomBank,$position_VietcomBank,$position_DongaBank){
       $array_result = array();
       $exchange = new Exchange();

       /*ABBank - Ngân hàng TMCP An Bình*/
        if($position_ABBank ==''){
            $array_ABBank = array("AB Bank","-","-","-");
        }else{
            $array_ABBank = $exchange->Money("ABBank","https://www.abbank.vn/ExchangeRate/ExchangeRate/GetListExchangeRateByDate?date=".$exchange->getDateCurrentforMbBank(),0,$position_ABBank,1,2,3);
            $array_ABBank = $this->changeDotToComma($array_ABBank);
        }

       /*ACB Bank -  Ngân hàng Á Châu*/
       if($position_ACB ==''){
           $array_ACB =array("ACB","-","-","-");
       }else{
           if($exchange->getTimesACB()>-1){
               $array_ACB = $exchange->Money("ACB",'http://acb.com.vn/ACBComponent/jsp/html/vn/exchange/getlisttygia.jsp?lannt='.$exchange->getTimesACB().'&txtngaynt='.$exchange->getDateCurrent(),0,$position_ACB,2,3,4);
               $array_ACB = $this->changeNullAndZeroToDash($array_ACB);
           }else{
               $array_ACB =array("ACB","-","-","-");
           }
       }

       /*AgriBank - Ngân hàng Nông Nghiệp và Phát triển nông thôn*/
       if($position_AgriBank ==''){
           $array_Agri =array("AgiBank","-","-","-");
       }else{
           $array_Agri = $exchange->Money("AgriBank","http://sgd-agribank.com.vn/ty-gia.html",0,$position_AgriBank,1,2,3);
       }

       /*BIDV - Ngân Hàng TMCP Đầu từ và phát triển Việt Nam*/
       if($position_BIDV ==''){
           $array_BIDV =array("BIDV","-","-","-");
       }else{
           $array_BIDV = $exchange->Money("BIDV","http://bidv.com.vn/Ty-gia-ngoai-te.aspx?ngay=".$exchange->getDateCurrent(),2,$position_BIDV,2,3,4);
       }

       /*MbBank - Ngân Hàng Quân Đội*/
       if($position_MBBank ==''){
           $array_MbBank =array("MB Bank","-","-","-");
       }else{
           $array_MbBank = $exchange->Money("MB Bank","https://mbbank.com.vn/congcu/Lists/TyGia/ty-gia.aspx?FilterField1=NgayHieuLuc&FilterValue1=".$exchange->getDateCurrentforMbBank(),$position_MBBank,2,1,2,3);
       }

       /*SacomBank - Ngân Hàng Sài Gòn Thương Tín*/
       if($position_SacomBank ==''){
           $array_SacomBank =array("SacomBank","-","-","-");
       }else{
           $array_SacomBank = $exchange->Money("SacomBank","http://www.sacombank-sbr.com.vn/chuyen-doi-ngoai-te",4,$position_SacomBank,1,2,3);
           $array_SacomBank = $this->changeDotToComma($array_SacomBank);
       }

       /*TechcomBank - Ngân hàng Kỹ Thương Việt Nam*/
       if($position_TechcomBank ==''){
           $array_TechCom =array("TechcomBank","-","-","-");
       }else{
           $array_TechCom=$exchange->Money("TechcomBank",'https://www.techcombank.com.vn/customfield/findexchange?catId=234&date=20/09/2016',0,$position_TechcomBank,1,2,3);
           $array_TechCom = $this->removeHtmlInText($array_TechCom);
           $array_TechCom = $this->removeSpace($array_TechCom);

       }

       /*VietcomBank - Ngân hàng TMCP Ngoại Thương Việt Nam*/
       if($position_VietcomBank ==''){
           $array_VietCom =array("VietcomBank","-","-","-");
       }else{
           $array_VietCom = $exchange->Money("VietcomBank","http://www.vietcombank.com.vn/ExchangeRates/",0,$position_VietcomBank,2,3,4);
       }

       /*DongABank - Ngân hàng Đông Á*/
       if($position_DongaBank ==''){
           $array_DongA =array("Đông Á","-","-","-");
       }else{
           $array_DongA = $exchange->Money("Đông Á","http://kinhdoanh.dongabank.com.vn/widget/temp/?p_p_id=DTSCDongaBankEView_WAR_DTSCDongaBankIERateportlet&p_p_lifecycle=0&p_p_state=maximized&p_p_mode=view",0,$position_DongaBank,2,3,5);
           $array_DongA = $this->changeDotToComma($array_DongA);
       }
       array_push($array_result,$array_ABBank,$array_ACB,$array_Agri,$array_BIDV,$array_MbBank,$array_SacomBank,$array_TechCom,$array_VietCom,$array_DongA);
       return $array_result;
   }
   function removeHtmlInText($array){
       for($i = 0; $i<count($array); $i++){
           $array[$i] = strip_tags($array[$i]);
       }
       return $array;
   }
   function removeSpace($array){
       for($i = 0; $i<count($array); $i++){
           $array[$i] =preg_replace("/\s|&nbsp;/",'', $array[$i]);
       }
       return $array;
   }
   function changeDotToComma($array){
       for($i = 0; $i<count($array); $i++){
           $array[$i] =str_replace('.',',', $array[$i]);
       }
       return $array;
   }
   function changeNullAndZeroToDash($array){
       for($i = 0; $i<count($array); $i++){
           if($array[$i] ==''){
               $array[$i] = str_replace('','-', $array[$i]);
           }
           if($array[$i] =='0'){
               $array[$i] =str_replace('0','-', $array[$i]);
           }

       }
       return $array;
   }
}