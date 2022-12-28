const totalUsersChart = document.getElementById("chart-total-users").getContext('2d');
const activeUsersChart = document.getElementById("chart-active-users").getContext('2d');

const sideNavLinks = document.querySelectorAll(".side-nav-link");
const homeLink = sideNavLinks[0];
const clinicStaffLink = sideNavLinks[1];
const treatmentLogLink =  sideNavLinks[2];
const prescriptionLink = sideNavLinks[3];
const recommendationLink = sideNavLinks[4];

setNavItem(homeLink, adminNav.home.link, adminNav.home.icon, adminNav.home.text);
setNavItem(clinicStaffLink, adminNav.clinic_staff.link, adminNav.clinic_staff.icon, adminNav.clinic_staff.text);
setNavItem(treatmentLogLink, adminNav.treatment_log.link, adminNav.treatment_log.icon, adminNav.treatment_log.text);
setNavItem(prescriptionLink, adminNav.prescription.link, adminNav.prescription.icon, adminNav.prescription.text);
setNavItem(recommendationLink, adminNav.recommendation.link, adminNav.recommendation.icon, adminNav.recommendation.text);


function getAllUsers(){
    const url = "http://localhost/ayumed/ajax/getAllUsers";
    const method = "GET";
    const responseType = "JSON";

    ajax(url, method, responseType).then(function (result){
        if(result.status === 200){
            let noOfPatients = result.response.patients;
            let noOfStaff = result.response.staffMembers;
            let noOfPharmacists= result.response.pharmacists;

            document.getElementById('total-users-count').innerHTML = noOfPatients + noOfStaff + noOfPharmacists;

            const totalUserData = {
                labels: [
                    "Patients",
                    "Staff",
                    "Pharmacists"
                ],
                datasets: [{
                    data: [noOfPatients,noOfStaff,noOfPharmacists],
                    backgroundColor: [
                        '#FFA500',
                        '#6b08c3',
                        '#008000'
                    ],
                }],
                hoverOffset: 4
            };

            new Chart(totalUsersChart, {
                type: 'pie',
                data: totalUserData,
                options: {}
            });
        }
    });
}

function getActiveUsers(){
    const url = "http://localhost/ayumed/ajax/getActiveUsers";
    const method = "GET";
    const responseType = "JSON";

    ajax(url, method, responseType).then(function (result){
        if(result.status === 200){
            console.log(result.response);
            let noOfPatients = result.response.patients;
            let noOfStaff = result.response.staffMembers;
            let noOfPharmacists= result.response.pharmacists;

            document.getElementById('active-users-count').innerHTML = noOfPatients + noOfStaff + noOfPharmacists;

            const activeUserData = {
                labels: [
                    "Patients",
                    "Staff",
                    "Pharmacists"
                ],
                datasets: [{
                    data: [noOfPatients,noOfStaff,noOfPharmacists],
                    backgroundColor: [
                        '#FFA500',
                        '#6b08c3',
                        '#008000'
                    ],
                }],
                hoverOffset: 4
            };

            new Chart(activeUsersChart, {
                type: 'pie',
                data: activeUserData,
                options: {}
            });
        }
    });
}

getAllUsers();
getActiveUsers();