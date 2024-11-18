
document.addEventListener('DOMContentLoaded', function () {
    // Page_Load();
});
function Page_Load() {
    console.log('Initializing Job Page...',IsPostBack);
    if (!IsPostBack)
        {
            console.log('check')
            PopulateStates();
            // LoadRecruiters();
            // loadCompanyname();
        }
}

function PopulateStates(){
    console.log('called',csrfToken)
    fetch(`/api/states`, {
        method: 'GET', // or 'POST', 'PUT', 'DELETE', etc.
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Parse the JSON response
    })
    .then(data => {
        console.log('State Details:', data); // Handle the data
        // You can update the UI or process the response here
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });

}
function LoadRecruiters(){
    fetch(`/api/recruiters/${jobId}`, {
        method: 'GET', // or 'POST', 'PUT', 'DELETE', etc.
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token for security
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Parse the JSON response
    })
    .then(data => {
        console.log('Job Details:', data); // Handle the data
        // You can update the UI or process the response here
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}
function loadCompanyname(){
    fetch(`/api/companies/${jobId}`, {
        method: 'GET', // or 'POST', 'PUT', 'DELETE', etc.
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token for security
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Parse the JSON response
    })
    .then(data => {
        console.log('Job Details:', data); // Handle the data
        // You can update the UI or process the response here
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}


function showSuccessPopup(jobId) {
    $('#jobIdSpan').text(jobId);
    $('#successModal').modal('show');
}

function validateFileUpload() {
    const fileInput = document.getElementById('<%= fileUploadJobImage.ClientID %>');
    const filePath = fileInput.value;
    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (fileInput.files.length > 0 && !allowedExtensions.exec(filePath)) {
        alert('Please upload a valid image file (jpg, jpeg, png, gif).');
        fileInput.value = '';
        return false;
    }
    return true;
}   


