const vendors = document.querySelectorAll(".vendorInf");

function showVendor(){
    const vendor = this;
    const id = vendor.getAttribute('id');


    if(!vendor.childNodes.item(10)) {

        fetch(`/vendorSingle/${id}`, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(id)
        }).then(function (response) {
            return response.json();
        }).then(function (addresses) {
            for (let i = 0; i < addresses.length; i++) {
                createAddress(addresses[i].street, addresses[i].building_number, addresses[i].city,
                    addresses[i].postal_code, addresses[i].state, addresses[i].country,
                    addresses[i].phone, addresses[i].email, vendor);
            }

        });
    }
}

function createAddress(stre, bNO, city, poCo, sta, count, pho, ema, container){
    const template = document.querySelector("#addressCont");
    const clone = template.content.cloneNode(true);

    const street = clone.querySelector(".street");
    street.innerHTML = stre + " " + bNO;

    const cit = clone.querySelector(".city");
    cit.innerHTML = poCo + ", " + city;

    const state = clone.querySelector(".state");
    state.innerHTML = sta + ", " + count;

    const phone = clone.querySelector(".phone");
    phone.innerHTML = pho;

    const email = clone.querySelector(".email");
    email.innerHTML = ema;

    container.appendChild(clone);
}


vendors.forEach(button => button.addEventListener("click", showVendor));
