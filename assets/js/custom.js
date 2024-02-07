/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function () {
    // Hapus striped table
    $(".table").removeClass("table-striped");

    // Add width table in rekap

    // D3 AKT
    $(
        "#tableAktAwal_wrapper, #tableAktAkhir_wrapper, #tableAktNilai_wrapper"
    ).css({
        width: "2000px",
    });

    // D4 AKM
    $(
        "#tableAkmAwal_wrapper, #tableAkmAkhir_wrapper, #tableAkmNilai_wrapper"
    ).css({
        width: "2000px",
    });

    // D4 Keu
    $(
        "#tableKeuAwal_wrapper, #tableKeuAkhir_wrapper, #tableKeuNilai_wrapper"
    ).css({
        width: "2000px",
    });

    // Rekap Outline KPS
    $("#outKpsAwal_wrapper, #outKpsAkhir_wrapper").css({
        width: "2500px",
    });

    // Rekap Proposal, Bimbingan, Skripsi KPS
    $("#rekapAwal_wrapper, #rekapAkhir_wrapper").css({
        width: "2000px",
    });
    $("#rekapNilai_wrapper").css({
        width: "2500px",
    });
});

$(".confirm-delete").click(function (event) {
    let form = $(this).closest("form");
    event.preventDefault();
    swal({
        title: "Anda yakin ingin menghapus?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
    });
});

// DataTables
let table = new DataTable("#table", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tablePaging = new DataTable("#tablePaging", {
    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let table1 = new DataTable("#table1", {
    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let outlineTable = new DataTable("#outlineTable", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tableAktAwal = new DataTable("#tableAktAwal", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tableAktAkhir = new DataTable("#tableAktAkhir", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tableAktNilai = new DataTable("#tableAktNilai", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tableAkmAwal = new DataTable("#tableAkmAwal", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tableAkmAkhir = new DataTable("#tableAkmAkhir", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tableAkmNilai = new DataTable("#tableAkmNilai", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tableKeuAwal = new DataTable("#tableKeuAwal", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tableKeuAkhir = new DataTable("#tableKeuAkhir", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let tableKeuNilai = new DataTable("#tableKeuNilai", {
    paging: false,

    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let outKpsAwal = new DataTable("#outKpsAwal", {
    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let outKpsAkhir = new DataTable("#outKpsAkhir", {
    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let rekapAwal = new DataTable("#rekapAwal", {
    paging: false,
    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let rekapAkhir = new DataTable("#rekapAkhir", {
    paging: false,
    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});
let rekapNilai = new DataTable("#rekapNilai", {
    paging: false,
    language: {
        emptyTable: "Tidak ada data tersedia",
    },
});


    //
    // let tabelRekapAwal2 = new DataTable("#tableRekapAwal2", {
    //     language: {
    //         emptyTable: "Tidak ada data tersedia",
    //     },
    // });
    //
    // let tabelRekapAwal3 = new DataTable("#tableRekapAwal3", {
    //     language: {
    //         emptyTable: "Tidak ada data tersedia",
    //     },
    // });
    //
    // let tabelRekapAwal4 = new DataTable("#tableRekapAwal4", {
    //     language: {
    //         emptyTable: "Tidak ada data tersedia",
    //     }
    // });
document.addEventListener('DOMContentLoaded', function() {
    // Your DataTables initialization code here
    for (let i = 1; i <= 4; i++) {
        new DataTable(`#tableRekapAkhir${i}`, {
            language: {
                emptyTable: "Tidak ada data tersedia",
            },
        });
    }

    for (let i = 1; i <= 4; i++) {
        new DataTable(`#tableRekapAwal${i}`, {
            language: {
                emptyTable: "Tidak ada data tersedia",
            },
        });
    }

    for (let i = 1; i <= 4; i++) {
        new DataTable(`#tableRekapNilai${i}`, {
            language: {
                emptyTable: "Tidak ada data tersedia",
            },
        });
    }
});




function showPW() {
    const inputPW = document.querySelector("#password");
    const eye = document.querySelector(".eye");
    const eyeSlash = document.querySelector(".eye-slash");

    inputPW.type = "text";
    eye.classList.add("d-none");
    eyeSlash.classList.remove("d-none");
}

function hidePW() {
    const inputPW = document.querySelector("#password");
    const eye = document.querySelector(".eye");
    const eyeSlash = document.querySelector(".eye-slash");

    inputPW.type = "password";
    eyeSlash.classList.add("d-none");
    eye.classList.remove("d-none");
}
