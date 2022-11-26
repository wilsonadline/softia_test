

var etudiants =  document.getElementById("attestation_Etudiants");
var setAtt = etudiants.setAttribute("onchange", "change()")

function change(){
  var p = document.getElementById('demo');
  var text = etudiants.options[etudiants.selectedIndex].text;
  p.innerText = text;
  
}