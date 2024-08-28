$(document).ready(function () {
    const tableConfig = 
        {
            ordering: false,
            layout: {
                topStart: {
                    buttons: [
                        {
                            extend: "copy",
                            exportOptions: {
                                columns: ":visible",
                                columns: [0, 1, 2],
                            },
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: ":visible",
                                columns: [0, 1, 2],
                            },
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: [0, 1, 2],
                            },

                            customize: function (doc) {
                                doc.content[1].table.widths = "*"
                                    .repeat(doc.content[1].table.body[0].length)
                                    .split("");
                            },
                        },
                    ],
                },
            },
        }
    ;

    $("#table").DataTable(tableConfig);
    $("#table2").DataTable(tableConfig);
});
