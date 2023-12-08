$(document).ready(function() {
    $('#myTable').DataTable({
        "lengthMenu": [5], // Menampilkan pilihan untuk menampilkan 5 baris
        "pageLength": 5, // Jumlah baris yang ditampilkan secara default
    });
});