// sidenav bar
const sideNavLinks = document.querySelectorAll(".side-nav-link");
const homeLink = sideNavLinks[0];
const clinicStaffLink = sideNavLinks[1];
const pharmacistLink =  sideNavLinks[2];
const prescriptionLink = sideNavLinks[3];
const recommendationLink = sideNavLinks[4];

setNavItem(homeLink, adminNav.home.link, adminNav.home.icon, adminNav.home.text);
setNavItem(clinicStaffLink, adminNav.clinic_staff.link, adminNav.clinic_staff.icon, adminNav.clinic_staff.text);
setNavItem(pharmacistLink, adminNav.pharmacist.link, adminNav.pharmacist.icon, adminNav.pharmacist.text);
setNavItem(prescriptionLink, adminNav.prescription.link, adminNav.prescription.icon, adminNav.prescription.text);
setNavItem(recommendationLink, adminNav.recommendation.link, adminNav.recommendation.icon, adminNav.recommendation.text);


// for admin dashboard
if(document.URL === URL_ROOT + adminNav.home.link){
    // get charts
    const totalUsersChart = document.getElementById("chart-total-users").getContext('2d');
    const activeUsersChart = document.getElementById("chart-active-users").getContext('2d');
    const overallStatsChart = document.getElementById('chart-stats-overall').getContext('2d');

    const months =['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    getAllUsers(totalUsersChart);
    getActiveUsers(activeUsersChart);
    getOverallStats(overallStatsChart, months);
}


// functions of admin user

function getAllUsers(chart){
    const url = "http://localhost/ayumed/ajax/getAllUsers";
    const method = "GET";
    const responseType = "JSON";

    ajax(url, method, responseType).then(function (result){
        if(result.status === 200){
            let noOfPatients = result.response.patients;
            let noOfStaff = result.response.staffMembers;
            let noOfPharmacists= result.response.pharmacists;

            document.getElementById('total-users-count').innerHTML = noOfPatients + noOfStaff + noOfPharmacists;

            const totalUserData = chartData(
                [
                    "Patients",
                    "Staff",
                    "Pharmacists"
                ],
                "",
                [
                    noOfPatients,
                    noOfStaff,
                    noOfPharmacists
                ],
                [
                    '#FFA500',
                    '#6b08c3',
                    '#008000'
                ],
            );

            drawChart(chart,
                'pie',
                totalUserData,
                {
                    responsive: true,
                    maintainAspectRatio: false
                }
            );
        }
    });
}

function getActiveUsers(chart){
    const url = "http://localhost/ayumed/ajax/getActiveUsers";
    const method = "GET";
    const responseType = "JSON";

    ajax(url, method, responseType).then(function (result){
        if(result.status === 200){
            let noOfPatients = result.response.patients;
            let noOfStaff = result.response.staffMembers;
            let noOfPharmacists= result.response.pharmacists;

            document.getElementById('active-users-count').innerHTML = noOfPatients + noOfStaff + noOfPharmacists;

            const activeUserData = chartData(
                [
                    "Patients",
                    "Staff",
                    "Pharmacists"
                ],
                "",
                [
                    noOfPatients,
                    noOfStaff,
                    noOfPharmacists
                ],
                [
                    '#FFA500',
                    '#6b08c3',
                    '#008000'
                ],
            );

            drawChart(
                chart,
                'pie',
                activeUserData,
                {
                    responsive: true,
                    maintainAspectRatio: false
                }
            );
        }
    });
}

function getNoOfMonths(){
    const date = new Date();
    return  date.getMonth();
}

function getPrevMonths(monthsArr){
    return monthsArr.slice(0,getNoOfMonths());
}


function getOverallStats(chart, monthsArr){
    const prevMonths = getPrevMonths(monthsArr)

    const overAllData = multiLineChartData(
        prevMonths,
        [
            {
                label: "Appointments by Month",
                data: [
                    12,
                    23,
                    15,
                    34,
                    25,
                    42,
                    39,
                    52,
                    17,
                    21,
                    35
                ],
                borderColor: '#007BFF',
                backgroundColor: '#007BFF'
            },
            {
                label: "Prescriptions by Month",
                data: [
                    34,
                    14,
                    20,
                    25,
                    32,
                    43,
                    38,
                    54,
                    13,
                    17,
                    24
                ],
                borderColor: '#28A745',
                backgroundColor: '#28A745'
            },
            {
                label: "Orders by Month",
                data: [
                    19,
                    16,
                    37,
                    39,
                    56,
                    26,
                    47,
                    54,
                    27,
                    21,
                    36
                ],
                borderColor: '#DC3545',
                backgroundColor: '#DC3545'
            },
        ],
    );

    drawChart(
        chart,
        'line',
        overAllData,
        {
            responsive: true,
            maintainAspectRatio: false
        }
    );
}

function getTotalPrescriptions(){

}

function getTotalOrders(){

}

