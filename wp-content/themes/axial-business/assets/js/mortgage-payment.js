<!--Hide JavaScript from Java-Impaired Browsers

var irate, mi, cmi, years, tprinc, princ, paym, cpaym, osp,v,downp,downr,comp;

function calcPaym(cdn){

   tprinc = round2d(parseFloat(document.smpc.tprinc.value));

   downp = .01*parseFloat(document.smpc.downp.value);

   downr = ceil2d(downp*tprinc);

   princ = tprinc-downr;

   

   document.smpc.princ.value = fmt2d(princ,0);

   document.smpc.downr.value = fmt2d(downr,0);

   

   if(cdn)comp="Canadian"; else comp="U.S";

   document.smpc.comp.value = comp;

   

   irate = .01*parseFloat(document.smpc.percent.value);

   years=parseFloat(document.smpc.years.value);

   term = parseFloat(document.smpc.term.value);

   if(term > years)term=years;

   

   if (term==0 || years==0||irate<.0001||princ<1)

   {alert("values must be numeric");}

   else 

   {

       if(cdn)mi = Math.pow(1+ irate/2,1/6) 

       else   mi = 1+(irate/12);

       v = 1/mi;

       paym = ceil2d(princ*(mi-1)/(1-Math.pow(mi,-(years*12))));

       osp = (princ-(v*paym*(1-Math.pow(v,12*term)))/(1-v))/Math.pow(v,12*term);

       if(osp<0)osp = 0;

       

       document.smpc.paym.value=fmt2d(paym,0);

       document.smpc.owed.value = fmt2d(osp,0);

   }

}

function round2d(n){return(.01* Math.round(100*n));}

function floor2d(n){return(.01* Math.floor(100*n));}

function ceil2d(n){return(.01* Math.ceil(100*n));}

// format number n as string width w with 2 decimal places

function fmt2d(n,w)

{

   var work,dp,sl,dl;

   

   work = ""+floor2d(n); // force only 2 decimals

   sl=work.length;

   

   if(-1 == (dp = work.indexOf(".")))work=work+".00";

   else if(3 > sl-dp)work = work+".00".substring(sl-dp,3);

   sl = work.length;

   if(0 != w && w !=sl)

      if(w<sl){work = "*";for(sl=1;sl<w;sl++)work=work+"*";}

      else for(;sl<w;sl++)work=" "+work; 

   return work;

}

//-->
