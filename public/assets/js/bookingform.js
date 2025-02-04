(function () {
    "use strict";

    // State array
    const state = [
        { name: "JOHOR", abbreviation: "JOHOR" },
        { name: "KEDAH", abbreviation: "KEDAH" },
        { name: "KELANTAN", abbreviation: "KELANTAN" },
        { name: "TERENGGANU", abbreviation: "TERENGGANU" },
        { name: "NEGERI SEMBILAN", abbreviation: "NEGERI SEMBILAN" },
        { name: "PAHANG", abbreviation: "PAHANG" },
        { name: "PENANG", abbreviation: "PENANG" },
        { name: "PERAK", abbreviation: "PERAK" },
        { name: "PERLIS", abbreviation: "PERLIS" },
        { name: "SELANGOR", abbreviation: "SELANGOR" },
        { name: "KUALA LUMPUR", abbreviation: "KUALA LUMPUR" },
        { name: "MELAKA", abbreviation: "MELAKA" },
        // ... add more states as needed
    ];

    // Time array
    const time = [
        { name: "09.00 AM", abbreviation: "09.00 AM" },
        { name: "09.30 AM", abbreviation: "09.30 AM" },
        { name: "10.00 AM", abbreviation: "10.00 AM" },
        { name: "10.30 AM", abbreviation: "10.30 AM" },
        { name: "11.00 AM", abbreviation: "11.00 AM" },
        { name: "11.30 AM", abbreviation: "11.30 AM" },
        { name: "12.00 PM", abbreviation: "12.00 PM" },
        { name: "12.30 PM", abbreviation: "12.30 PM" },
        { name: "01.00 PM", abbreviation: "01.00 PM" },
        { name: "01.30 PM", abbreviation: "01.30 PM" },
        { name: "02.00 PM", abbreviation: "02.00 PM" },
        { name: "02.30 PM", abbreviation: "02.30 PM" },
        { name: "03.00 PM", abbreviation: "03.00 PM" },
        { name: "03.30 PM", abbreviation: "03.30 PM" },
        { name: "04.00 PM", abbreviation: "04.00 PM" },
        { name: "04.30 PM", abbreviation: "04.30 PM" },
        { name: "05.00 PM", abbreviation: "05.00 PM" },
        { name: "05.30 PM", abbreviation: "05.30 PM" },
        { name: "06.00 PM", abbreviation: "06.00 PM" },
        // ... add more times as needed
    ];

    // Item array
    const recycleitem = [
        { name: "Mixed Paper", abbreviation: "Mixed Paper" },
        { name: "Plastic", abbreviation: "Plastic" },
        { name: "Electronic", abbreviation: "Electronic" },
        { name: "Aluminium", abbreviation: "Aluminium" },
        { name: "Steel", abbreviation: "Steel" },
        { name: "Cardboard", abbreviation: "Cardboard" },
        { name: "Textiles", abbreviation: "Textiles" },
        { name: "Metal", abbreviation: "Metal" },
        { name: "Glass", abbreviation: "Glass" },
        // ... add more recycle item as needed
    ];

    // weight array
    const estweight = [
        { name: "Less than 1 KG", abbreviation: "Less than 1" },
        { name: "1 KG", abbreviation: "1" },
        { name: "2 KG", abbreviation: "2" },
        { name: "3 KG", abbreviation: "3" },
        { name: "4 KG", abbreviation: "4" },
        { name: "5 KG", abbreviation: "5" },
        { name: "More than 5 KG", abbreviation: "More than 5" },
        // ... add more times as needed
    ];

    // // Populate states dropdown
    const populateStates = () => {
        const stateDropdown = document.getElementById("state");

        state.forEach((stateItem) => {
            const option = document.createElement("option");
            option.value = stateItem.abbreviation;
            option.textContent = stateItem.name;
            stateDropdown.appendChild(option);
        });
    };

    // Pickup Time dropdown
    const pickuptime = () => {
        const timeDropdown = document.getElementById("pickuptime");

        time.forEach((timeItem) => {
            const option = document.createElement("option");
            option.value = timeItem.abbreviation;
            option.textContent = timeItem.name;
            timeDropdown.appendChild(option);
        });
    };
    document.addEventListener("DOMContentLoaded", function () {
        populateStates2(); // Call the function to populate state dropdown
    });

    // Validation for checkboxes
    function validateCheckboxes() {
        const checkboxes = document.querySelectorAll(".form-check-input");
        const errorElement = document.getElementById("recycleitemError");
        let isChecked = false;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            errorElement.textContent = "Please select at least one item type.";
            return false;
        } else {
            errorElement.textContent = "";
            return true;
        }
    }

    // Recycle item dropdown
    const recycle = () => {
        const recycleDropdown = document.getElementById("type_of_item");

        recycleitem.forEach((recycleItem) => {
            const option = document.createElement("option");
            option.value = recycleItem.abbreviation;
            option.textContent = recycleItem.name;
            recycleDropdown.appendChild(option);
        });
    };

    // Est. weigh dropdown
    const weight = () => {
        const weightDropdown = document.getElementById("est_weight");

        estweight.forEach((weightItem) => {
            const option = document.createElement("option");
            option.value = weightItem.abbreviation;
            option.textContent = weightItem.name;
            weightDropdown.appendChild(option);
        });
    };

    // Initialization function, including populating states
    document.addEventListener("DOMContentLoaded", function () {
        populateStates(); // Call the function to populate state dropdown
        pickuptime(); // Call the function to pickuptime dropdown
        // recycle(); // Call the function to recycle item dropdown
        weight(); // Call the function to weight dropdown
        showTab(currentTab); // Show the initial tab
    });

    let currentTab = 0;

    const ActiveTab = (n) => {
        if (n === 0) {
            document.getElementById("account").classList.add("active");
            document.getElementById("account").classList.remove("done");
            document.getElementById("personal").classList.remove("done");
            document.getElementById("personal").classList.remove("active");
        } else if (n === 1) {
            document.getElementById("account").classList.add("done");
            document.getElementById("personal").classList.add("active");
        } else if (n === 2) {
            document.getElementById("personal").classList.add("done");
            document.getElementById("payment").classList.add("active");
        } else if (n === 3) {
            document.getElementById("payment").classList.add("done");
            document.getElementById("confirm").classList.add("active");
        }
    };

    const showTab = (n) => {
        const x = document.getElementsByTagName("fieldset");
        x[n].style.display = "block";
        ActiveTab(n);
    };

    const nextBtnFunction = (n) => {
        if (n === 1) {
            let valid;
            if (currentTab === 0) valid = validateForm();
            else if (currentTab === 1) valid = validateForm2();
            else if (currentTab === 2) valid = validateForm3();

            if (!valid) return false;
        }

        const x = document.getElementsByTagName("fieldset");
        x[currentTab].style.display = "none";
        currentTab += n;
        showTab(currentTab);
    };

    const nextbtn = document.querySelectorAll(".next");
    Array.from(nextbtn, (nbtn) => {
        nbtn.addEventListener("click", function () {
            nextBtnFunction(1);
        });
    });

    const prebtn = document.querySelectorAll(".previous");
    Array.from(prebtn, (pbtn) => {
        pbtn.addEventListener("click", function () {
            nextBtnFunction(-1);
        });
    });

    function validateForm() {
        let valid = true;
        const fields = [
            { id: "name", errorId: "nameError", message: "Name is required" },
            {
                id: "phoneno",
                errorId: "phonenoError",
                message: "Phone number is required",
            },
            {
                id: "address",
                errorId: "addressError",
                message: "Please select Address ",
            },
        ];

        fields.forEach((field) => {
            const inputElement = document.getElementById(field.id);
            const errorElement = document.getElementById(field.errorId);
            if (inputElement && errorElement) {
                errorElement.innerHTML = "";
                if (inputElement.value.trim() === "") {
                    errorElement.innerHTML = field.message;
                    valid = false;
                }
            }
        });

        return valid;
    }

    function validateForm2() {
        let valid = true;
        const fields = [
            {
                id: "pickupdate",
                errorId: "pickupdateError",
                message:
                    "Pick-Up Date is required and must be at least tomorrow.",
            },
            {
                id: "pickuptime",
                errorId: "pickuptimeError",
                message:
                    "Pick-Up Time is required and must be between 9:00 AM and 6:00 PM.",
            },
        ];

        fields.forEach((field) => {
            const inputElement = document.getElementById(field.id);
            const errorElement = document.getElementById(field.errorId);
            if (inputElement && errorElement) {
                errorElement.innerHTML = "";
                if (inputElement.value.trim() === "") {
                    errorElement.innerHTML = field.message;
                    valid = false;
                }
            }
        });

        return valid;
    }

    function validateForm3() {
        let valid = true;
        const validImageExtensions = ["jpg", "jpeg", "png"];
        const fields = [
            {
                id: "image",
                errorId: "imageError",
                message: "Image is required",
            },
            {
                id: "type_of_item",
                errorId: "recycleitemError",
                message: "Select at least 1 type",
            },
            {
                id: "est_weight",
                errorId: "estweightError",
                message: "Please select Estimated Weight",
            },
        ];

        fields.forEach((field) => {
            const inputElement = document.getElementById(field.id);
            const errorElement = document.getElementById(field.errorId);
            if (inputElement && errorElement) {
                errorElement.innerHTML = "";
                if (inputElement.value.trim() === "") {
                    errorElement.innerHTML = field.message;
                    valid = false;
                }
                // Additional validation for the image field
                if (field.id === "image" && inputElement.value.trim() !== "") {
                    const fileName = inputElement.value;
                    const fileExtension = fileName
                        .split(".")
                        .pop()
                        .toLowerCase();
                    if (!validImageExtensions.includes(fileExtension)) {
                        errorElement.innerHTML =
                            "Invalid image type. Allowed types are: " +
                            validImageExtensions.join(", ");
                        valid = false;
                    }
                }
            }
        });

        // Validate checkboxes as part of form3 validation
        if (!validateCheckboxes()) valid = false;

        return valid;
    }
})();
