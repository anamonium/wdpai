const addVendorButton = document.querySelector("#addNewVendor");

const nameInput = document.querySelector("#newVendorName");
const categoryInput = document.querySelector("#newVendorCat");
const descriptionInput = document.querySelector("#newVendorDesc");

const vendorContainer = document.querySelector(".vendor");

const addAddress = document.querySelectorAll(".fa-plus");

function addVendor() {

    const name = nameInput.value;
    const category = categoryInput.value;
    const desc = descriptionInput.value;

    if(name && category && desc) {

        fetch("/addVendor", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({"name": name, "category": category, "description": desc})
        }).then(function (response) {
            return response.json();
        }).then(function (id) {
            createNewVendor(id['id_vendor'], name, category, desc);
            nameInput.value = "";
            categoryInput.value = "";
            descriptionInput.value = "";
        });
    }
}

function createNewVendor(id,vName, vCategory, vDescription){
    const template = document.querySelector("#newVendor");
    const clone = template.content.cloneNode(true);
    const itm = clone.querySelector(".vendorInf");

    itm.id = id;

    const name = clone.querySelector(".name");
    name.innerHTML = vName;

    const category = clone.querySelector(".category");
    category.innerHTML = vCategory;

    const description = clone.querySelector(".description");
    description.innerHTML = vDescription;

    clone.querySelector(".fa-plus").addEventListener("click", addAddres);
    itm.addEventListener("click", showVendor);

    vendorContainer.appendChild(clone);
}

function addAddres() {
    const template = document.querySelector("#addAddress");
    const clone = template.content.cloneNode(true);

    clone.querySelector("#addNewAddress").addEventListener("click", sendAddress);
    const container = this.parentElement;
    container.appendChild(clone);

}


function sendAddress() {
    const container = this;
    const cont = container.parentElement;
    const id = cont.getAttribute('id')
    const street = cont.querySelector("#newVendorStreet").value;
    const builNo = cont.querySelector("#newVendorBuNo").value;
    const posCo = cont.querySelector("#newVendorPoCo").value;
    const city = cont.querySelector("#newVendorCity").value;
    const state = cont.querySelector("#newVendorState").value;
    const country = cont.querySelector("#newVendorCountry").value;
    const email = cont.querySelector("#newVendorEmail").value;
    const phone = cont.querySelector("#newVendorPhone").value;

    const bo = parseInt(builNo);

    if(street  && bo && posCo  && city  && state  && country  && email  && phone ) {

        fetch(`/addVendorAddress/${id}`, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                "street": street, "bNo": bo, "posCo": posCo,
                "city": city, "state": state, "country": country,
                "email": email, "phone": phone
            })
        });

    }

}


addVendorButton.addEventListener("click", addVendor);
addAddress.forEach(button => button.addEventListener("click", addAddres));