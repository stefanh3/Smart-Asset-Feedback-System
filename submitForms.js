// This form

function submitForms() {
    var availForm = new FormData(document.getElementById('availForm'));
    var fitForm = new FormData(document.getElementById('fitForm'));
    var aesthForm = new FormData(document.getElementById('aesthForm'));
    var qualForm = new FormData(document.getElementById('qualForm'));

    // Combining the form data into one object to be processed at once
    // - This is important as want to create it under one record.
    var combinedFormData = new FormData();
    for (var pair of availForm.entries()) {
        combinedFormData.append(pair[0], pair[1]);
    }
    for (var pair of fitForm.entries()) {
        combinedFormData.append(pair[0], pair[1]);
    }
    for (var pair of aesthForm.entries()) {
        combinedFormData.append(pair[0], pair[1]);
    }
    for (var pair of qualForm.entries()) {
        combinedFormData.append(pair[0], pair[1]);
    }
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submit.php", true);

    xhr.onload = function() {
        if(xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };

    xhr.send(combinedFormData);
}
