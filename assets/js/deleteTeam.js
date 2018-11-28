const sendApiCall = (e) => {
    const hash = document.querySelector('#_hash').value;
    const idTeam = e.currentTarget.getAttribute('data-id');
    fetch(`/organizer/${hash}/deleteTeam/${idTeam}`).then(res => window.location.reload());
};

const deleteButtons = document.querySelectorAll('.deleteButton');
console.log(deleteButtons);
Array.from(deleteButtons).forEach(function(element) {
    element.addEventListener('click', sendApiCall);
});