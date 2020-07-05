//將8位數字轉成日期格式
function gParseDateNumber(dateNumber){
  var reg = /^[0-9]+.?[0-9]*$/;
  if(dateNumber.length!=8 || !reg.test(dateNumber)){
    return
  }

	if(dateNumber.length==8){
    y = dateNumber.substring(0,4);
    m = dateNumber.substring(4,6);
    d = dateNumber.substring(6,8);
    dateStr = y+'-'+m+'-'+d;
  }

  t = Date.parse(dateStr);
  if(!isNaN(t)) {
    //alert(這不是有效日期'');
    return dateStr;
  }
}