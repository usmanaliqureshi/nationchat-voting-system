function validateForm()
{

/* New User Form validation */
var name=document.forms["pbform"]["name"].value;

/* Current Password validation */
var currpass=document.forms["pbform"]["currpass"].value;

if (name==null || name=="")
  {
  alert("Please enter a name for new user");
  return false;
  } else if (currpass==null || currpass=="")
  {
  alert("Please enter a valid password to continue");
  return false;
  }

}