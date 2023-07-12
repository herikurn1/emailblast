<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Summarecon Email Blast</title>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">




    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">



    <link href="https://code.jquery.com/jquery-3.5.1.js" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js" rel="stylesheet" />




    <link href="/css/hasna_css/history.css" rel="stylesheet">
</head>


<body>

    <div class="wrapper1">
        <nav class="navbar fixed-top navbar-expand-md custom-navbar navbar-dark">
            <img src="hasna_img/img.navbar.jpg" alt="Description of the image" class="image-style">
            <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse"
                data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse " id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="/home"><b>HOME</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/history"><b>HISTORY</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="openSearchBar()"><b>SEARCH</b></a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="search-bar" id="searchbar">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Date">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="wrapper justify-content-center align-items-start min-vh-100 pt-5">
            <div class="w-100 p-5">
                <table id="table_mails" class="table table-striped table-bordered">
                    <thead></thead>
                    <tbody>
                        {{-- <tr>
                            <td>0346999</td>
                            <td>Jon Ken</td>
                            <td>14/05/2023</td>
                            <td>17:30 PM</td>
                            <td><img src="img/cancel.png"> Not Sent</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="deleteMailModal" tabindex="-1" aria-labelledby="deleteMailModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteMailModalLabel">Hapus Data Mail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formDeleteMail" class="needs-validation" novalidate>
                            @csrf
                            <input type="hidden" id="id" name="id" value="" />
                        </form>
                        Apakah anda yakin ingin menghapus data mail ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" form="formDeleteMail">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script>
        var table_mails;

        $(window).on('resize', function() {
            table_mails.columns.adjust();
        });

        $(document).ready(function() {
            table_mails = new DataTable('#table_mails', {
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": false,
                "scrollX": true,
                "ajax": {
                    url: "/api/history/mails",
                    dataSrc: function(json) {
                        return json.data;
                    },
                    statusCode: {
                        401: function() {
                            window.location.href = '/home';
                        }
                    }
                },
                "columns": [{
                        title: "No.",
                        data: null,
                        className: 'dt-center',
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        title: "From Email",
                        data: "from_email",
                        className: 'dt-head-center dt-body-left',
                    },
                    {
                        title: "Name",
                        data: "from",
                        className: 'dt-center',
                    },
                    {
                        title: "To",
                        data: "to",
                        className: 'dt-center',
                    },
                    {
                        title: "Bcc/Cc",
                        data: "cc",
                        className: 'dt-center',
                    },
                    {
                        title: "Title",
                        data: "title",
                        className: 'dt-center',
                    },
                    {
                        title: "Subject",
                        data: "subject",
                        className: 'dt-center',
                    },
                    {
                        title: "Body",
                        data: null,
                        className: 'dt-head-center dt-body-left',
                        render: function(data, type, row, meta) {
                            return '<div>' + row.body + '</div>';
                        }
                    },
                    {
                        title: "Sent",
                        data: null,
                        className: 'dt-center',
                        render: function(data, type, row, meta) {
                            return `<div><span class="position-absolute invisible">${row.is_sent}</span> ${row.is_sent == 1 ? '<img src="img/ceklis.png" alt="">' : '<img src="img/cancel.png" alt="">'}</div>`;
                        }
                    },
                    {
                        title: "Date",
                        data: null,
                        className: 'dt-center',
                        render: function(data, type, row, meta) {
                            const date = new Date(row.created_at);
                            const formattedDate = date.toLocaleDateString('en-GB');
                            return `<div>${row.created_at ? formattedDate : '<i>null</i>'}</div>`;
                        }
                    },
                    {
                        title: "Time",
                        data: null,
                        className: 'dt-center',
                        render: function(data, type, row, meta) {
                            const date = new Date(row.created_at);
                            const formattedTime = date.toLocaleTimeString('en-US', {
                                hour: 'numeric',
                                minute: 'numeric',
                                hour12: true
                            });
                            return `<div>${row.created_at ? formattedTime : '<i>null</i>'}</div>`;
                        }
                    },
                    {
                        title: "Last Changes",
                        data: null,
                        className: 'dt-center',
                        render: function(data, type, row, meta) {
                            const date = new Date(row.updated_at);
                            const formattedDateTime =
                                `${date.toLocaleDateString('en-GB')} ${date.toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}`;
                            return `<div>${row.updated_at ? formattedDateTime : '<i>null</i>'}</div>`;
                        }
                    },
                    {
                        title: "",
                        data: null,
                        className: 'dt-center',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `
                            <div class="d-flex flex-nowrap align-items-center justify-content-end" style="gap: 1rem;">
                                <a href="/${row.is_sent == 1 ? 'compose' : 'create'}?id=${row.id}">
                                    <button id="btn-modal-edit-mail-${row.id}" data-mail=${row.id} type="button" class="btn btn-sm btn-info d-flex flex-nowrap align-items-center justify-content-center">
                                        Edit
                                    </button>
                                </a>
                                <button id="btn-modal-delete-mail-${row.id}" data-mail=${row.id} type="button" class="btn btn-sm btn-danger d-flex flex-nowrap align-items-center justify-content-center">
                                    Delete
                                </button>
                            </div>
                            `;
                        }
                    },
                ]
            });
        });

        $(document).on('click', '[id^="btn-modal-delete-mail"]', function() {
            let row_id = $(this).data('mail');

            $(`#deleteMailModal #id`).val(row_id);

            $('#deleteMailModal').modal('show');
        });

        $('#formDeleteMail').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "/api/history/mail/delete",
                method: 'DELETE',
                type: "DELETE",
                data: $(this).serialize(),
                success: function(response) {
                    $('#deleteMailModal').modal('hide');
                    table_mails.ajax.reload();
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 401) {
                        window.location.href = '/home';
                    } else {
                        console.error(xhr.responseText);
                    }
                }
            });
        });

        var counter = 0;

        function openSearchBar() {
            counter++
            const search_box = document.getElementById("searchbar");
            if (counter % 2 == 0) {
                search_box.style.display = "none"
            } else {
                search_box.style.display = "block"
            }
        }
    </script>
</body>

</html>
