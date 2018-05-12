function validateCity() {
  var city = document.myform.city.value;
  var match = /^ *\w+ *$/.test(city);

  if (match) {
    document.getElementsByClassName("city")[0].style.visibility = "hidden";
    return true;
  }
  else {
    document.getElementsByClassName("city")[0].style.visibility = "hidden";
    return false;
  }
}

function validateAddress() {
  var address = document.myform.address.value
  var match = /^ *\w+ *$/.test(address);

  if (match) {
    document.getElementsByClassName("address")[0].style.visibility = "hidden";
    return true;
  }
  else {
    document.getElementsByClassName("address")[0].style.visibility = "hidden";
    return false;
  }
}

function validateState() {
  var state = document.myform.state.value;
  var match = /^ *(AL|AK|AS|AZ|AR|CA|CO|CT|DE|DC|FM|FL|GA|GU|HI|ID|IL|IN|IA|KS|KY|LA|ME|MH|MD|MA|MI|MN|MS|MO|MT|NE|NV|NH|NJ|NM|NY|NC|ND|MP|OH|OK|OR|PW|PA|PR|RI|SC|SD|TN|TX|UT|VT|VI|VA|WA|WI|WY) *$/.test(state);
  if (match) {
    document.getElementsByClassName("sta")[0].style.color = 'green';
    document.getElementsByClassName("sta")[0].innerHTML = "State recognized"; 
    return true;
  }
  else {
    document.getElementsByClassName("sta")[0].style.color = 'red';
    document.getElementsByClassName("sta")[0].innerHTML = "Not a state";
    return false;
  }
}

function validateZip() {
  var zip = document.myform.zip.value;
  var match = /^ *\d{5} *$/.test(zip);
  if (match) {
    document.getElementsByClassName("zip")[0].style.visibility = 'hidden';
    return true;
  }
  else {
    document.getElementsByClassName("zip")[0].style.visibility = 'initial';
    return false;
}