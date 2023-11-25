function checkUser() {
    let emailInput = document.getElementById('email');
    let username = emailInput.value;

    if (username === '') {
        alert('Email field cannot be empty.');
        return;
    }
    
}

function checkForgetField() {
    let forgot = document.getElementById('email').value;

    if (forgot === '') {
        alert('Email field cannot be empty.');
        return;
    }
}

function checRegistrationFields() {
    let firstNameInput = document.getElementById('first_name').value;
    let lastNameInput = document.getElementById('last_name').value;
    let genderInput = document.getElementsByName('gender')[0].value;
    let phoneInput = document.getElementById('phone').value;
    let dobInput = document.getElementById('dob').value;
    let addressInput = document.getElementById('address').value;
    let emailInput = document.getElementById('email').value;
    let passwordInput = document.getElementById('password').value;

    if (firstNameInput === '') {
        alert('First Name field cannot be empty.');
        return;
    }
    if (lastNameInput === '') {
        alert('Last Name field cannot be empty.');
        return;
    }
    if (genderInput === '') {
        alert('Please select a Gender.');
        return;
    }
    if (phoneInput === '') {
        alert('Phone field cannot be empty.');
        return;
    }
    if (dobInput === '') {
        alert('Date of Birth field cannot be empty.');
        return;
    }
    if (addressInput === '') {
        alert('Address field cannot be empty.');
        return;
    }
    if (emailInput === '') {
        alert('Email field cannot be empty.');
        return;
    }
    if (passwordInput === '') {
        alert('Password field cannot be empty.');
        return;
    }
}


function ajax(){
    let password = document.getElementById('password').value;
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'passCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('password='+password);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('passCheck').innerHTML = this.responseText;
        }
    }
}

/* function ajaxEmail(){
    let email = document.getElementById('email').value;
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'emailCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('email='+email);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('emailCheck').innerHTML = this.responseText;
        }
    }
}
 */
function ajaxEmail(){
   
    let username = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    let user =  {
                    'username': username,
                    'password': password,
                };
                
    let data = JSON.stringify(user);

    let xhttp = new XMLHttpRequest();
    
    xhttp.open('POST', 'emailCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('json='+data);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            /* let user = JSON.parse(this.responseText);
            document.getElementById('abc').innerHTML = user.email; */
            document.getElementById('emailCheck').innerHTML = this.responseText;
        }
    }
}