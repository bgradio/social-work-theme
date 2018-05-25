// -----------------------------------------------------------------
// CalcDisplayAmount - convert numeric entry to formatted text value
// -----------------------------------------------------------------
function CalcDisplayAmount(amt)
{
	var displayAmt;
	var amtValue;
	if (isNaN(amt)== true){   //not a valid number
		displayAmt = "0.00";
		return displayAmt;		
	}
 
      if (amt.length==0) {		// no value at all
		displayAmt = "0.00";
		return displayAmt;	
	}
 
// round to 2 places after the decimal point
	amtValue = parseFloat(amt);
	amtValue = Math.round(amtValue * 100) / 100;
	//	if user enters in value < 0, make it 0
	if (amtValue < 0) 
		amtValue = 0;
	
//	if it doesn't contain decimal point, add it 
	if (amtValue == Math.round(amtValue)) {
		displayAmt = amtValue + ".00";
	}
// else if it only contains one place after the decimal, add one more
	else if (amtValue * 10 == Math.round(amtValue * 10)) {
		displayAmt = amtValue + "0";
	}
 
// else it contains 2 places after the decimal, just return it
	else {
		displayAmt = amtValue;
	}
	return displayAmt;
}
 
// -----------------------------------------------------------------
// amountchange() - called when any amount changes
// -----------------------------------------------------------------
function amountchange()    {
	var total;
 
	/* change display format */
 
	total = 0;
 
	document.FrontPage_Form1.GIFT_AMOUNT1.value=CalcDisplayAmount(document.FrontPage_Form1.GIFT_AMOUNT1.value);
	total = total + parseFloat(document.FrontPage_Form1.GIFT_AMOUNT1.value)
 
	document.FrontPage_Form1.GIFT_AMOUNT2.value=CalcDisplayAmount(document.FrontPage_Form1.GIFT_AMOUNT2.value);
	total = total + parseFloat(document.FrontPage_Form1.GIFT_AMOUNT2.value)
 
	document.FrontPage_Form1.GIFT_AMOUNT3.value=CalcDisplayAmount(document.FrontPage_Form1.GIFT_AMOUNT3.value);
	total = total + parseFloat(document.FrontPage_Form1.GIFT_AMOUNT3.value)	
 
	total = Math.round(total * 100) / 100;
	document.FrontPage_Form1.totalamount.value=CalcDisplayAmount(total);
}

// ---------------------------------------------------
// My_Form_Validator()- Client side form validator 
// ---------------------------------------------------
function My_Form_Validator(form){
 
	if (form.totalamount.value == 0){
		alert("Please enter a donation to at least one fund before submitting.");
		return false;
	}
 
 
	if ((form.GIFT_AMOUNT3.value != 0) && ((form.fundEntry3.value.length < 2) || (form.fundEntry3.value == "Other - Indicate where to direct donation here"))){
		alert("Please enter a fund to receive your donation.");
		form.fundEntry3.focus();
		return false;
	}
	else {
		form.FUND3.value = "00000000/" + form.fundEntry3.value;
	}
 
} // End of My_Form_Validator