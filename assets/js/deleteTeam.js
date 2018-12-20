const sendApiCall = (e) => {
    const hash = document.querySelector('#_hash').value;
    const idTeam = e.currentTarget.getAttribute('data-id');
    fetch(`/organizer/${hash}/deleteTeam/${idTeam}`).then((res) => {
        console.log(res);
        document.location.reload();
        /*TODO
        * SUTVARKYTI arba panaikinti*/
    });
};

const deleteTeams = document.querySelectorAll('.team-list__delete');
Array.from(deleteTeams).forEach(function(element) {
    element.addEventListener('click', sendApiCall);
});
