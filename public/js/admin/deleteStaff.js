window.addEventListener('DOMContentLoaded', function (){
   const deleteBtn = document.querySelectorAll('.btn-delete');

   deleteBtn.forEach(function (btn) {
       btn.addEventListener('click', function (e) {
           e.preventDefault();
           const href = this.getAttribute('href');
           confirmation(
               'Delete Staff Member',
               'Are you sure?',
               'warning',
               'Yes',
               'No',
               href,
           );
       });
   });
});