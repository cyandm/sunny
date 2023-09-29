const form = document.querySelector("#contact_form");

if (form) {
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        document.querySelector("#submit_form").disabled = false;

        document.querySelector("#success_message").innerHTML = "";
        document.querySelector("#fail_message").innerHTML = "";
        let allData = {};

        Array.from(form.querySelectorAll("input, textarea")).forEach(function (
            element
        ) {
            allData[element.getAttribute("name")] = element.value;
        });

        let errors = [];
        Object.entries(allData).forEach(function ([key, value]) {
            // input is empty
            if (value === "") {
                let error = fieldName(key) + "  ضروری است ";
                errors.push(error);
            }
            if (value !== "" && key !== "email") {
                let errortext = sanitizeInput(value);
                errors.push(errortext);
            }

            // is email
            if (key === "email" && value !== "") {
                let emailError = emailValidate(value);
                errors.push(emailError);
            }


            function sanitizeInput(input) {
                const symbolsPattern =
                    /[\!\@\#\$\%\^\&\*\)\(\+\=\<\>\{\}\[\]\:\;\'\"\|\~\`\_\-]/;

                if (input.match(symbolsPattern)) {
                    return "لطفا " + fieldName(key) + " مناسب وارد کنید ";
                }
            }

            function emailValidate(input) {
                let emailLetters = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!input.match(emailLetters)) {
                    return fieldName(key) + "  را به درستی وارد کنید.";
                }
            }

            function fieldName(fieldName) {
                if (fieldName === "name") {
                    return "نام ";
                }
                if (fieldName === "email") {
                    return "ایمیل ";
                }
                if (fieldName === "message") {
                    return " متن پیام";
                }
            }
        });

        function isArrayEmptyOrAllUndefined(array) {
            if (array.length === 0) {
                return true; // The array is empty
            }

            for (const element of array) {
                if (element !== undefined) {
                    return false; // If any element is defined, return false
                }
            }
            return true; // If no element is defined, return true
        }

        console.log(ajax_var.nonce );
        if (isArrayEmptyOrAllUndefined(errors)) {
            const newSliders = JSON.stringify(allData);
            const xhr = new XMLHttpRequest();

            xhr.open("POST", ajax_var.url, true);

            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success === true) {
                        console.log("true");
                        response.data;
                        document.getElementById("submit_form").disabled = false;
                        Array.from(form.querySelectorAll("input, textarea")).forEach(
                            function (element) {
                                element.value = "";
                                element.disabled = true;
                                element.classList.add("disabled");
                                document.querySelector("#submit_form").style.display = "none";
                                console.log(response.message);
                            }
                        );
                        const successMessage = document.getElementById("success_message");
                        successMessage.innerHTML =
                            response.message +
                            '<div class="form-message-close"><i class="icon-close"></i></div>';
                        successMessage.innerHTML += "</ul>";
                        successMessage.classList.add("show");
                    }
                }
            };
            const formData = new URLSearchParams();
            formData.append('action', 'contact_form');
            formData.append('_nonce', ajax_var.nonce);

            for (const [key, value] of Object.entries(allData)) {
                formData.append(key, value);
            }

            xhr.send(formData);



        } else {
            document.getElementById("submit_form").disabled = false;
            document.getElementById("fail_message").innerHTML = "";
            document.getElementById("fail_message").innerHTML =
                '<ul><div class="form-message-close"><i  class="icon-close"></i></div></ul>';
            errors.forEach(function (v) {
                if (v !== undefined) {
                    document.getElementById("fail_message").querySelector("ul").innerHTML +=
                        "<li> - " + v + "</li>";
                }
            });
            document.getElementById("fail_message").innerHTML += "</ul>";
            document.getElementById("fail_message").classList.add("show");
        }
    });

    const formMessageCloseButtons = document.querySelectorAll(".form-message-close");
    formMessageCloseButtons.forEach(function (button) {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            closeToaster();
        });
    });

    document.body.addEventListener("click", function (e) {
        closeToaster();
    });

    function closeToaster() {
        const formMessages = document.querySelectorAll(".form-message");
        formMessages.forEach(function (message) {
            message.classList.remove("show");
        });
    }
}


