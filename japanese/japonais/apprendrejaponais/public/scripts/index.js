const link = document.querySelector('.dede');
const content = document.querySelector('.caca');
link.addEventListener('click', function() {
  content.classList.toggle('open'); 
  });


async function fetchresponse(formData) {
  await fetch("./index.php?action=modifmail", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      return response.json();
    })
    .then((response) => {
      setTimeout(() => {
      document.querySelector("#exampleModal .modal-title").innerHTML =
        response.modalTitle;
      document.querySelector("#exampleModal .modal-body").innerHTML =
        response.message;
      }, 2000);
    });
}

const form = document.getElementById("mailmodif-form");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  const formData = new FormData(form);
  fetchresponse(formData);
  form.reset();
});



async function fetchresponse(formData) {
  await fetch("./index.php?action=modif", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      return response.json();
    })
    .then((response) => {
      setTimeout(() => {
      document.querySelector("#exampleModal .modal-title").innerHTML =
        response.modalTitle;
      document.querySelector("#exampleModal .modal-body").innerHTML =
        response.message;
      }, 2000);
    });
}

const form2 = document.getElementById("mailmodif-form");

form2.addEventListener("submit", function (e) {
  e.preventDefault();
  const formData2 = new FormData(form2);
  fetchresponse(formData2);
 
});



async function fetchresponse(formData) {
  await fetch("./index.php?action=modifpassword", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      return response.json();
    })
    .then((response) => {
      setTimeout(() => {
      document.querySelector("#exampleModal .modal-title").innerHTML =
        response.modalTitle;
      document.querySelector("#exampleModal .modal-body").innerHTML =
        response.message;
      }, 2000);
    });
}

const form3 = document.getElementById("mailmodif-form");

form3.addEventListener("submit", function (e) {
  e.preventDefault();
  const formData3 = new FormData(form3);
  fetchresponse(formData3);
 
});

// response.success === true ? "Succès" : "Erreur";

//
// vehicle.color = "blue";
// if (vehicle.type == "car") vehicle.color = "red";

// //
// if (vehicle.type == car) {
//   vehicle.color = "red";
// } else {
//   vehicle.color = "blue";
// }
// //
// vehicle.color = vehicle.type == "car" ? "red" : "blue";
// //

// ((vehicle) => {

//   if(vehicle.type != 'airplane') return;

//   vehicle.color = "red";
// })();
