
$(".tombolhapus").on("click", function(e) {
    e.preventDefault();
    const href = $(this).attr("href");
    Swal.fire({
        title: "Anda Yakin ?",
        text: "Data yang telah dihapus tidak akan kembali lagi !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Batal",
        confirmButtonText: "Hapus Data"
    }).then(result => {
        if (result.value) {
            document.location.href = href;
        }
    });
});



$(".proses").on("click", function(e) {
    e.preventDefault();
    var href = $(".proses").attr("href");
    let timerInterval;
    Swal.fire({
        title: "Proses Keluar",
        html: "Anda akan keluar dalam beberapa saat.",
        timer: 2000,
        timerProgressBar: true,
        onBeforeOpen: () => {
            Swal.showLoading();
            timerInterval = setInterval(() => {
                const content = Swal.getContent();
                if (content) {
                    const b = content.querySelector("b");
                    if (b) {
                        b.textContent = Swal.getTimerLeft();
                    }
                }
            }, 100);
        }
    }).then(result => {
        window.location.href = href;
    });
});
