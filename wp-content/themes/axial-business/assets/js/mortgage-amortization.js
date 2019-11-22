<!--Hide JavaScript from Java-Impaired Browsers

var num=0;

var amt=0;

var per=0;

var months=0;

var nls="";

var rr="\r";

var b="                               ";

var d="-----------------------------"

+"----------------------------------";

var s="$";

function iA(){

 this.length=iA.arguments.length;

 for (var i=0;i<this.length;i++){

  this[i]=iA.arguments[i];

  }

 }

var pwr=new iA(10);

var dec=new iA(16);

pwr[0]=1;

for (var i=0;i<9;i++){

 pwr[i+1]=pwr[i]*10;

}

dec[0]=.1;

dec[1]=.01;

dec[2]=.001;

dec[3]=.0001;

dec[4]=.00001;

dec[5]=.000001;

dec[6]=.0000001;

dec[7]=.00000001;

dec[8]=.000000001;

dec[9]=.0000000001;

dec[10]=.00000000001;

dec[11]=.000000000001;

dec[12]=.0000000000001;

dec[13]=.00000000000001;

dec[14]=.000000000000001;

dec[15]=.0000000000000001;

   

var ns="01234567890";

var cr="";

var str="";



function stn(){

 num=0;

 pos=str.indexOf(".");

 sfx="";

 if (pos>-1){

  sfx=str.substring(pos+1,str.length);

  str=str.substring(0,pos);

  }

 strl=str.length;

 for (var i=strl-1;i>-1;i--){

  cr=str.substring(i,i+1);

  pos=ns.indexOf(cr);

  num+=pos*pwr[strl-i-1];

  }

  if (sfx!=""&&sfx.length>dp){

   pos=ns.indexOf(sfx.charAt(dp+1));

   if (pos>4){

    pos=ns.indexOf(sfx.charAt(dp));

    sfx=sfx.substring(0,dp-1)+(pos+1);

    }

   }

  if (sfx!=""){

   for (var i=0;i<dp;i++){

    cr=sfx.substring(i,i+1);

    pos=ns.indexOf(cr);

    num+=pos*dec[i];

    }

/*    sfx="";

    sfx+=num;

    pos=sfx.indexOf(".");

    sfx=sfx.substring(pos+1,sfx.length);

    if (sfx.charAt(dp+1)=="9"){

     num+=dec[sfx.length-2];

     } */

  }

 }



function testIt(form){

 str=document.isn.amt.value;

 fmtIt();

 bl=str.length+3;

 dp=2;

 stn();

 amt=num;

 str=document.isn.per.value;

 dp=4;

 stn();

 per=num;

 str=document.isn.months.value;

 dp=0;

 stn();

 months=num;

 if (months<1||months>999||per<.0001||per>99||amt<1||amt>pwr[9]){

  alrt();

  }

 else{

 computeForm();

 }

}



function computeForm(){

 ls="";

 isnnum=1;

 i=per/12/100;

 fpv=0;

 for (var j=0;j<months;j++)

  isnnum=isnnum*(1+i);

  tmp=(amt*isnnum*i)/(isnnum-1);

  fpv+=tmp;

  fcalc=((months*fpv)-amt);

  

 prtSched();

 }

 

function prtSched(){

 fpv+=.01;

 str=""

 str+=fpv;

 fmtIt();

 dp=2;

 stn();

 fpv=num;

 pct=per/12/100;

 if (bl<14){

  bl=14;

  }

 ls="Amortization Schedule: "+document.isn.months.value

 +" months to repay "+s+document.isn.amt.value

 +" at "+document.isn.per.value+"%."+rr+d+rr

 +"Payment       Payment       Interest      Principal     Balance"

 +rr

 +"Number        Amount        Amount        Reduction     Due"

 +rr+d+rr;

 for (var j=0;j<months;j++){

  ntr=(amt*pct);

  str="";

  str+=ntr;

  fmtIt();

  ntr1=s+str;

  prp=fpv-ntr;

  if (prp>amt){

   prp=amt;

   }

  str="";

  str+=prp;

  fmtIt();

  prp1=s+str;

  amt-=prp;

  str="";

  str+=amt;

  fmtIt();

  amt1=s+str;

  if (fpv>(ntr+prp)){

   fpv=ntr+prp;

   }

  str="";

  str+=fpv;

  fmtIt();

  fpv1=s+str;

  str="";

  str+=(j+1)+".";

  ls+=b.substring(0,2)+str+b.substring(0,12-str.length)

  +fpv1+b.substring(0,14-fpv1.length)+ntr1

  +b.substring(0,14-ntr1.length)+prp1

  +b.substring(0,14-prp1.length)+amt1

  +rr;

  }

  document.isn.sched.value=ls+d+rr

  +"  * Interest calculated at 1/12th of annual interest rate on"

  +rr+"    the remaining principal amount. (Rounding errors "

  +"possible)"+rr+d+rr;

 }

function fmtIt(){

 pos=str.indexOf(".");

 if (pos==0){

  str="0"+str;

  pos++;

  }

 if (pos<0){

  str+=".00";

  pos=str.indexOf(".");

  }

 str+="0000";

 str=str.substring(0,pos+4);

 cr=str.charAt(str.length-1);

 pos=ns.indexOf(cr);

 str=str.substring(0,str.length-1);

 if (pos>5){

  fmtIt1();

  }

 }

 function fmtIt1(){

  for (var k=str.length-1;k>-1;k--){

   cr=str.charAt(k);

   posn=ns.indexOf(cr);

   if (posn<0){

    k--;

   }

   else{

    str=str.substring(0,k)+ns.substring(posn+1,posn+2)

    +str.substring(k+1,str.length);

    if (posn!=9){

     k=-1;

    }

   }

  }

 }

function alrt(){

 alert("You couldn't know. Months must be from"

 +" 1 to 999, Loan amount from 1 to "+pwr[9]

 +" and Interest from .001 to 99%");

}

//-->


