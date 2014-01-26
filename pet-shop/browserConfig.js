var browser = $.uaMatch(navigator.userAgent).browser;
if (browser=='mozilla' || browser=='opera'){
	$("#ppzStyle").attr("href", "ppz2.css");
	$("#footerStyle").attr("href","footer2.css"); 	
	$("#homeStyle").attr("href","Includes/home2.css"); 	
}

if (browser=='msie'){
	$("#ppzStyle").attr("href", "ppz3.css");
	$("#footerStyle").attr("href","footer3.css"); 
}