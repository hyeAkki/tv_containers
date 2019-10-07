//  text
function on_head_fb_text()
{
	document.getElementById("head_text_backgraound").style.display='block';
}
function out_head_fb_text()
{
	document.getElementById("head_text_backgraound").style.display='none';
}


// head profile pic,name,home

function head_pro_pic_over()
{
	

	document.getElementById("head_name_font").style.color = "white";
}
function head_pro_pic_out()
{

	
	document.getElementById("head_name_font").style.color = "#00c18e";	
}
function head_home_over()
{
	document.getElementById("head_home_bg").bgColor = "white";
	document.getElementById("head_home_font").style.color = "white";
}
function head_home_out()
{
	document.getElementById("head_home_bg").bgColor = "white";
	document.getElementById("head_home_font").style.color = "white";	
}

// Left name
function left_name_over()
{
	document.getElementById("left_name").style.textDecoration = "underline"
}
function left_name_out()
{
	document.getElementById("left_name").style.textDecoration = "none"
}

