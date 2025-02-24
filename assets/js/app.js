document.getElementById('editButton').addEventListener('click', function() {
    let formElements = document.getElementById('profileForm').elements;
    for (let i = 0; i < formElements.length; i++) {
        if (formElements[i].tagName.toLowerCase() !== 'button') {
            formElements[i].disabled = false;
        }
    }
    document.getElementById('editButton').style.display = 'none';
    document.getElementById('saveButton').style.display = 'block';
});

document.getElementById('profileForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let formElements = document.getElementById('profileForm').elements;
    for (let i = 0; i < formElements.length; i++) {
        if (formElements[i].tagName.toLowerCase() !== 'button') {
            formElements[i].disabled = true;
        }
    }
    document.getElementById('editButton').style.display = 'block';
    document.getElementById('saveButton').style.display = 'none';
});