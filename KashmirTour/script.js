// 

// var formSubmit = document.getElementById("formSubmit");

// formSubmit.addEventListener("submit", function(event) {
//   event.preventDefault();
//   const mail = document.getElementById("email").value;
//   const tour = document.getElementById("tour").value;
//   clearErrors();

//   if (mail === "") {
//     alert("Please enter your email.");
//   } else if (tour === "") {
//     alert("Please select a tour.");
//   } else {
//     // ✅ Send data to submit.php without leaving the page
//     fetch("submit.php", {
//       method: "POST",
//       body: new URLSearchParams({ email: mail, tour: tour })
//     });

//     alert("Email: " + mail + "\nTour: " + tour);
//     formSubmit.reset();
//   }
// });

var formSubmit = document.getElementById("formSubmit");

formSubmit.addEventListener("submit", function(event) {
  event.preventDefault();

  const mail = document.getElementById("email").value;
  const tour = document.getElementById("tour").value;

  if (mail === "") {
    alert("Please enter your email.");
  } else if (tour === "") {
    alert("Please select a tour.");
  } else {
    // ✅ Send data in background
    fetch("submit.php", {
      method: "POST",
      body: new URLSearchParams({ email: mail, tour: tour })
    });

    // ✅ Close the modal
    const modal = bootstrap.Modal.getInstance(document.getElementById("booking-model"));
    if (modal) modal.hide();

    // ✅ Clear form
    formSubmit.reset();

       // ✅ Success message (no OK button)
    const msg = document.createElement("div");
    msg.textContent = " Form submitted successfully!";
    msg.style.position = "fixed";
    msg.style.top = "20px";
    msg.style.right = "20px";
    msg.style.background = "#7fe782ff";
    msg.style.color = "white";
    msg.style.padding = "10px 20px";
    msg.style.borderRadius = "8px";
    msg.style.zIndex = "9999";
    msg.style.fontSize = "16px";
    document.body.appendChild(msg);

    setTimeout(() => msg.remove(), 2000);
  }
});


