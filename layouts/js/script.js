// Function to check if an entry has been made today
function checkEntry() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'check_entry.php', true);
    xhr.onload = function() {
        if (this.responseText === 'no_entry') {
            document.getElementById('notification').style.display = "flex";
            document.getElementById('notification').innerHTML = 'Reminder: Please enter your daily value!';
        } else {
            document.getElementById('notification').style.display = "none";
            document.getElementById('notification').innerHTML = '';
        }
    }
    xhr.send();
}

// Check every hour if an entry has been made
setInterval(checkEntry, 3600000); // Check every hour
checkEntry();

// Add event listeners for select elements to change icons based on selection
document.addEventListener('DOMContentLoaded', function() {
    const selects = document.querySelectorAll('.status_select');
    
    selects.forEach(select => {
        select.addEventListener('change', function() {
            const icon = this.nextElementSibling;
            icon.className = 'icon'; // Reset icon class
            
            if (this.value === 'correct') {
                icon.classList.add('correct-icon');
            } else if (this.value === 'mistake') {
                icon.classList.add('mistake-icon');
            }
        });
    });
    
    // Add event listener for form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        let isValid = true;
        selects.forEach(select => {
            if (select.value === 'none') {
                isValid = false;
                select.classList.add('error');
            } else {
                select.classList.remove('error');
            }
        });
        
        if (!isValid) {
            event.preventDefault();
            document.getElementById('notification').style.display = "flex";
            document.getElementById('notification').innerHTML = 'Please fill in all fields before submitting.';
        } else {
            document.getElementById('notification').style.display = "none";
            document.getElementById('notification').innerHTML = '';
        }
    });
});
