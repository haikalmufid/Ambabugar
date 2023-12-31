function onToggleMenu(e){
    const navLinks = document.querySelector('.navLinks')
    e.name = e.name === "menu-outline" ? "close" : "menu-outline"
    navLinks.classList.toggle('top-[100%]')
}

function submitReservation() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;

    // You can perform additional validation if needed

    // Send reservation data to the server using Fetch API
    fetch('reserve.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&date=${encodeURIComponent(date)}&time=${encodeURIComponent(time)}`,
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        alert('Reservation successful!'); // You can replace this with a more user-friendly notification
        // You may want to redirect the user or perform other actions after a successful reservation
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Reservation failed. Please try again.'); // You can replace this with a more user-friendly notification
    });
}
