
var regx=/\S/;
var regx1=/^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
var regx2=/^\s*\d+\s*$/;
function empty_check(cnt_id)
{
var cnt_value=document.getElementById(cnt_id).value;
//if(cnt_value=="")
if(!cnt_value.match(regx))
//if(cnt_value.trim().length==0)
{
alert("Empty error");
}
}

function empty_check1(cnt_id,span_id)
{
var cnt_value=document.getElementById(cnt_id).value;

var regx=/\S/;
if(!cnt_value.match(regx))
{
document.getElementById(span_id).style.visibility="visible";
}
else
{

document.getElementById(span_id).style.visibility="hidden";
}
}


function error_check(cnt_id,span_id,err_no)
{
var cnt_value=document.getElementById(cnt_id).value;
switch(err_no)
{
case 1:reg=regx;break;
case 2:reg=regx1; break;
case 3:reg=regx2; break;
}
if(!cnt_value.match(reg))
{
document.getElementById(span_id).style.visibility="visible";

}
else
{
document.getElementById(span_id).style.visibility="hidden";
}
}
function error_check1(cnt_id,span_id,err_no)
{
var cnt_value=document.getElementById(cnt_id).value;
switch(err_no)
{
case 1:reg=regx;break;
case 2:reg=regx1; break;
case 3:reg=regx2; break;
}
if(!cnt_value.match(reg))
{
document.getElementById(span_id).style.visibility="visible";
return false;
}
else
{
document.getElementById(span_id).style.visibility="hidden";
return true;
}
}
function frm_check()
{
var flag=error_check1('cname','cname_span',1);
var flag1=error_check1('email','email_span',2);
var flag2=error_check1('age','age_span',3);
var flag3=error_check1('roll','roll_span',3);
var flag4=error_check1('mob','mob_span',3);
if(flag==true && flag1==true && flag2==true && flag3==true && flag4==true )
{
return true;
}
else{
return false;
}
}
