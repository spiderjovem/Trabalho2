
<html>
<head>
<title>Calculadora</title>
<style type="text/css">

td {

color: #FFFF00;
font-weight: bold;
text-align: center;
border: 1px solid #000099;
}

textarea#textarea {

background-color: #759475;
text-align: right;
color: #222722;
border-color: #000099;
}
table#calculadora {
border: 1px solid  #000099;
background-color: #3300cc;
}

#titulo {

font-family: arial, verdana, sans serif;
font-size: 1em;
font-weight: bold;
text-align: center;
}

</style>
<script type="text/javascript">
var xmlHttp
var op = 0;
var result = 0;
var pointer = 0;
function calc()
{ 
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
cellvalue = document.getElementById("textarea").value;
var url="ajax.php";
url=url+"?action=calc";
url=url+"&cell="+cellvalue+"&op="+op;
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChanged() 
{ 
if (xmlHttp.readyState==4)
{ 
	document.getElementById("textarea").value=xmlHttp.responseText;
op = 0;
result = 1;
pointer = 0;
}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}

function IsNumeric(sText)
{
var ValidChars = "0123456789.";
var IsNumber=true;
var Char; 
for (i = 0; i < sText.length && IsNumber == true; i++) 
{ 
	Char = sText.charAt(i); 
	if (ValidChars.indexOf(Char) == -1) 
	{
	IsNumber = false;
	}
}
return IsNumber;
}
function add(value) {
var x = document.getElementById("textarea").value;
if (result) {
	x = '';
	result = 0;
}
if (IsNumeric(value) == false) {
	if (op == 0) {
	x = x + "\n" + value + "\n";
	op = value;
	if (value == "+") op = "%2B";
	if (value == "/") op = "%2F";
	pointer = 0;
	} else {
		z = "não pode inserir mais nenhuma operacao";
		alert(z);
	}
} else {
	if (value == ".") {
		if (pointer == 1) {
			alert("Nao podes ter mais que uma virgula");
			value = '';
		}
		pointer = 1;
	}
x = x+value;
}
document.getElementById("textarea").value = x;
}
</script>
</head>
<body>
<div id="body">
<form name="test">
<table id="calculadora" cellpadding="10" cellspacing="0" align="center">
<tr>
   <td align="center" colspan="4">
       <span id="titulo">Calculadora</span><br/>
        <textarea id="textarea" rows="2" cols="20"></textarea>
    </td>
</tr>
<tr>
   <td>
      <input type="button" onclick="add(7);" value="7" />
   </td>
   <td>
      <input type="button" onclick="add(8);" value="8" />
   </td>
   <td>
      <input type="button" onclick="add(9);"  value="9" />
   </td>
   <td>
      <input type="button" onclick="add('/');" value="/" />
   </td>
</tr>
<tr>
   <td>
      <input type="button" onclick="add(4);"  value="4" />
   </td>
   <td>
       <input type="button" onclick="add(5);"  value="5" />
   </td>
   <td>
       <input type="button" onclick="add(6);" value="6" />
   </td>
   <td>
       <input type="button" onclick="add('*');" value="*" />
   </td>
</tr>
<tr>
    <td>
       <input type="button" onclick="add(1);" value="1" />
    </td>
     <td>
<input type="button" onclick="add(2);" value="2" />
    </td>
    <td>
       <input type="button" onclick="add(3);" value="3" />
    </td>
    <td>
       <input type="button" onclick="add('-');" value="-" />
    </td>
</tr>
<tr> 
   <td>
       <input type="button" onclick="add(0);" value="0" />
   </td>
   <td>
       <input type="button" onclick="add('.');" value="." />
   </td>
   <td>
       <input type="button" onclick="calc();" value="="/>
   </td>
   <td>
       <input type="button" onclick="add('+');" value="+" />
   </td>
</tr>