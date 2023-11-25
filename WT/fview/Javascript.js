function checklogin() 
    {
        let username = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        

        if (username === '' && password === '') 
            {
                alert('Email / Password field cannot be empty.');
                return;
            }
        if (username === '') 
            {
                alert('Email field cannot be empty.');
                return;
            }
        if (password === '') 
            {
                alert('Password field cannot be empty.');
                return;
            }
              
    }

function checkForgetPass() 
    {
        let forgot = document.getElementById('email').value;

        if (forgot === '') 
            {
                alert('Please Fill The Email Field.');
                return;
            }
    }


function checRegistrationFields() {
    let firstNameInput = document.getElementById('firstname').value;
    let lastNameInput = document.getElementById('lastname').value;
    let genderInput = document.querySelector('input[name="gender"]:checked');
    let phoneInput = document.getElementById('phone').value;
    let dobInput = document.getElementById('birthday').value;
    let addressInput = document.getElementById('address').value;
    let emailInput = document.getElementById('email').value;
    let passwordInput = document.getElementById('pass').value;

    if (firstNameInput === '') {
        alert('First Name field cannot be empty.');
        return;
    }
    if (lastNameInput === '') {
        alert('Last Name field cannot be empty.');
        return;
    }
    if (!genderInput) {
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

function showPaymentFields(paymentMethod) {
    let cardFields = document.getElementById('cardholder_fields');
    let cardsFields = document.getElementById('card_password_fields');
    
    let bkashFields = document.getElementById('bkash_fields');
    let bkashsFields = document.getElementById('bkash_password_fields');

    let nagadFields = document.getElementById('nagad_fields');
    let nagadsFields = document.getElementById('nagad_password_fields');

    let rocketFields = document.getElementById('rocket_fields');
    let rocketsFields = document.getElementById('rocket_password_fields');

    cardFields.style.display = (paymentMethod === 'Card') ? 'block' : 'none';
    cardsFields.style.display = (paymentMethod === 'Card') ? 'block' : 'none';

    bkashFields.style.display = (paymentMethod === 'Bkash') ? 'block' : 'none';
    bkashsFields.style.display = (paymentMethod === 'Bkash') ? 'block' : 'none';

    nagadFields.style.display = (paymentMethod === 'Nagad') ? 'block' : 'none';
    nagadsFields.style.display = (paymentMethod === 'Nagad') ? 'block' : 'none';

    rocketFields.style.display = (paymentMethod === 'Rocket') ? 'block' : 'none';
    rocketsFields.style.display = (paymentMethod === 'Rocket') ? 'block' : 'none';
}





