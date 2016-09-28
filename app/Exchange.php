<?php

namespace App;

use DateInterval;
use Illuminate\Database\Eloquent\Model;
use Yangqi\Htmldom\Htmldom;

class Exchange extends Model
{

    public $timestamps = true;
    /*Lấy tỷ giá ngoại tệ từ các ngân hàng với các thuộc tính truyền vào là:
       - $bankname: Tên của Ngân Hàng.
       - $posTable: Vị trí của bảng trong trang web đó.
       - $posMuaTm: Vị trí của cột Mua Tiền Mặt bên trong bảng.
       - $posMuaCk: Vị trí của cột Mua Chuyển Khoản bên trong bảng
       - $posBanCk: Vị trí của cột Bán Chuyển Khoản bên trong bảng.
   */
    function Money($bankName,$url,$posTable,$posRow,$posMuaTm,$posMuaCk,$posBanCk,$temp=''){

        $html = new Htmldom($url);
        $cell=$html->find('table')[$posTable]->find('tr')[$posRow]->find('td');
        if($cell){
            $muatm= $cell[$posMuaTm]->innertext;
            $muack= $cell[$posMuaCk]->innertext;
            $banck= $cell[$posBanCk]->innertext;
            $array = array($bankName ,$muatm,$muack,$banck);
        }else{
            $array = array($bankName ,"-","-","-");
        }
        return $array;
    }
    /*
     - Đối với ngân hàng ACB, trong một ngày, ngân hàng này cập nhật khá nhiều lần.
     Trong đường dẫn tới trang get dữ liệu, lại tồn tại số lần. Vì vậy ta cần lấy số lần.
     - Đối với ngày Chủ nhật thì không tồn tại số lần ở trang web này. Chúng ta
     cần lấy số lần để kiểm tra xem hôm nay có phải là chủ nhật hay không:
        - Nếu tồn tại số lần. Thì là ngày trong tuần. Thực hiện như bình thường.
        - Nếu không tồn tại số lần. Nghĩa là hôm nay là Chủ Nhật -> Lấy kết quả của ngày thứ 7
   */
    function getTimesACB()
    {
        $times =-1;
        $html = new Htmldom("http://acb.com.vn/ACBComponent/jsp/html/vn/exchange/getlan.jsp?cmd=EXCHANGE&txtngaynt=".$this->getDateCurrent());
        $lan=$html->find('option');
        if(count($lan) >0){
           $times = $lan[0]->innertext;
        }
        return $times;
    }
    /*
        - Trong đường dẫn của ngân hàng ACB, tồn tại một trường là ngày tháng. Để lấy giá trị,
        ta cần phải biết được ngày mà người dùng truy cập vào. (Ở đây, lấy múi giờ tại TP HCM)
   */
    function getDateCurrent()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        return date("d/m/Y");
    }
    /*
        - Trong đường dẫn của ngân hàng MbBank, tồn tại một trường là ngày tháng. với định dạng: YYYY-mm-dd .
        Để lấy giá trị, ta cần phải biết được ngày mà người dùng truy cập vào. (Ở đây, lấy múi giờ tại TP HCM)
   */
    function getDateCurrentforMbBank()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        return date("Y-m-d");
    }
    /*
       - Trong đường dẫn của ngân hàng MbBank, tồn tại một trường là ngày tháng. với định dạng: dd-mm-YYYY .
       Để lấy giá trị, ta cần phải biết được ngày mà người dùng truy cập vào. (Ở đây, lấy múi giờ tại TP HCM)
  */
    function getDateCurrentforTPBank()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        return date("d-m-Y");
    }
    /*
        - Đối với một số dữ liệu, ví dụ như từ ngân hàng TechcomBank thì sẽ tồn tại dữ liệu dạng in đậm và có
        khoảng trắng bên trong. Thì hàm dưới đây sẽ xử lý việc đó.
    */

    function removeSpaceAndBold($val){

    }
}
