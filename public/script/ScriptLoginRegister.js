$(document).ready(function () {
    const passwordInput         = document.querySelector("#password");
    const requirementList       = document.querySelectorAll(".requirement-list li");
    const contentList           = document.querySelectorAll(".content .requirement-list");
    const password_confirm      = document.querySelector('#password-confirm');
    const ErrorPassowrdConfirm  = document.querySelector('.ErrorPassowrdConfirm');

    const requirements = [
        { regex: /.{8,}/, index: 0 },
        { regex: /[0-9]/, index: 1 },
        { regex: /[a-z]/, index: 2 },
        { regex: /[^A-Za-z0-9]/, index: 3 },
        { regex: /[A-Z]/, index: 4 },
    ]

    passwordInput.addEventListener("keyup", (e) => {
        requirements.forEach(item => {
            const passwordValue = e.target.value;
            const isValid = item.regex.test(e.target.value);
            if (passwordValue.trim() === "") {

                contentList.forEach(content => {
                    content.style.display = 'none';
                });
                return;
            }
            const requirementItem = requirementList[item.index];
            contentList.forEach(content => {
                content.style.display = 'block';
            });

            if (isValid) {
                requirementItem.classList.add("valid");
                requirementItem.firstElementChild.className = "fa-solid fa-check";
            } else {
                requirementItem.classList.remove("valid");
                requirementItem.firstElementChild.className = "fa-solid fa-circle";
            }
        });
    });
    let passwordInputCheck = '';
    password_confirm.addEventListener('focus',(e) =>{
        passwordInputCheck = passwordInput.value;
    });
    password_confirm.addEventListener('input',(e) =>{
        if(e.target.value !== passwordInputCheck)
        {

            ErrorPassowrdConfirm.style.display = 'block';
            ErrorPassowrdConfirm.innerText = "Erreur : les mots de passe ne correspondent pas."
        }
        else
        {

            ErrorPassowrdConfirm.style.display = 'none';
        }
    });

    password_confirm.addEventListener('keyup',(e) => {
        const this_value = e.target.value;
        if (this_value.trim() === "") {

            contentList.forEach(content => {
                ErrorPassowrdConfirm.style.display = 'none';
            });
            return;
        }
    });


    $(".signin-form").submit(function (e) {

        const hasInvalidRequirement = Array.from(requirementList).some(item => item.firstElementChild.className === "fa-solid fa-circle");
        if (hasInvalidRequirement) {
            e.preventDefault();
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Envoi du formulaire empêché en raison d'exigences non valides.!",
            });
        }

    });
});
