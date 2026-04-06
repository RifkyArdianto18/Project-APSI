</div>
</section>
</div>

<footer class="main-footer text-center">
    <strong>© <?= date('Y') ?> Nusa Auto</strong>
</footer>

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- 🔥 CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById('chartPenjualan');

if(ctx){

    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($bulan) ?>,
            datasets: [{
                label: 'Penjualan',
                data: <?= json_encode($jumlah_penjualan) ?>,
                fill: false,
                tension: 0.3
            }]
        },
        options: {
            responsive: true
        }
    });

}
</script>
</body>
</html>